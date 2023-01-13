<?php

namespace App\Auth;

use App\Models\Pouzivatel;

class LoginAuthenticator extends DummyAuthenticator
{
    public function login($login, $password): bool
    {

        $user = Pouzivatel::getAll(whereClause: "email = '$login' ");
        if($user != null) {

            if(password_verify($password, $user[0]->getPassword())) {
                $_SESSION['user'] = $login;
                $_SESSION['role'] = $user[0]->getRole();
                return true;
            }
        }

//        if ($login == $password) {
//            $_SESSION['user'] = $login;
//            return true;
//        }

        return false;
    }

}