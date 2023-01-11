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

//    /**
//     * Register a user
//     * @param $userEmail
//     * @param $pass
//     * @return bool
//     */
//    function register($userEmail, $pass): bool;

    /**
     * Register a user
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\ViewResponse
     */
    public function register(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $registered = null;

        if(isset($formData['submit'])) {
            $registered = $this->checkRegistration($formData['email'],$formData['password']);
            if($registered) {
                //po uspesnom zaregistrovani

                if($this->tryCreateUser()) {
                    //TODO prihlasit pouzivatela
                } else {
                    //TODO uzivatel uz existuje
                }
                //echo '<script>alert("Úspešná registrácia!")</script>';
                return $this->redirect('?c=domov');
            }
        }

        $data = ($registered === false ? ['message' => 'Krátke heslo!'] : []);
        return $this->html($data);
    }

    public function tryCreateUser() {
        $email = $this->request()->getValue('email');
        $password = $this->request()->getValue('password');

        if($email != null && $password != null) {
            if(Pouzivatel::getAll(whereClause: "email = '$email'") == null) {
                $newUser = new Pouzivatel();
                $newUser->setEmail($email);
                $newUser->setPassword($password);
                $newUser->setRole("Klient");
                $newUser->save();
                return true;
            }
        }

        return false;
    }

    private function checkRegistration($email, $password): bool
    {
        echo '<script>alert("Checking!")</script>';
        //$emailString = strval($email);
        if(strlen($password) > 6) {
            return true;
        } else {
            return false;
        }
    }


}