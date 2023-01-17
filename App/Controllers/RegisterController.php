<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Pouzivatel;

/**
 * Class RegisterController
 * Controller for registration purpose
 * @package App\Controllers
 */
class RegisterController extends AControllerBase
{
    /**
     *
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\Response
     */
    public function index(): Response
    {
        return $this->redirect(Configuration::REGISTER_URL);
    }

    /**
     * Register a user
     * @return \App\Core\Responses\RedirectResponse
     */
    public function register(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $registered = null;

        if(isset($formData['submit'])) {
            $passwordFirst = $formData['password'];
            $passwordSecond = $formData['password_second'];
            if(!$this->checkPasswordLength($passwordFirst)) {
                $data = (['message' => 'Krátke heslo!']);
                return $this->html($data);
            }
            if(!$this->checkEqualityOfPasswords($passwordFirst,$passwordSecond)) {
                $data = (['message' => 'Heslá sa nezhodujú!']);
                return $this->html($data);
            }

            //po splneniPodmienok

            $pouzivatel = $this->tryCreateUser();

            if($pouzivatel != null ) {
                $_SESSION['user'] = $pouzivatel->getEmail();
                $_SESSION['role'] = $pouzivatel->getRole();
                return $this->redirect('?c=domov');
            } else {
                $data = ['message' => 'Používateľ už existuje!'];
                return $this->html($data);
            }

        }

        $data = ($registered === false ? ['message' => 'Chyba!'] : []);
        return $this->html($data);
    }

    /**
     * Check if there is a user with same email, if not, then create it and return it,
     * if there is alerady user, return null
     * @return Pouzivatel|null
     */
    public function tryCreateUser() : ?Pouzivatel {
        $email = $this->request()->getValue('email');
        $password = $this->request()->getValue('password');

        //TODO What if user add one dot into email?
        if($email != null && $password != null) {
            if(Pouzivatel::getAll(whereClause: "email = '$email'") == null) {
                $newUser = new Pouzivatel();
                $newUser->setEmail($email);

                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $newUser->setPassword($hashed_password);
                $newUser->setRole("Klient");
                $newUser->save();
                return $newUser;
            }
        }
        return null;
    }

    /**
     * Check password length
     * @return bool
     */
    private function checkPasswordLength($password): bool
    {
        return strlen($password) >= 8;
    }

    /**
     * Check if both passwords are the same
     * @return bool
     */
    private function checkEqualityOfPasswords($password,$passwordSecond): bool
    {
        return $password == $passwordSecond;
    }


}