<?php

namespace App\Auth;

use App\Models\Pouzivatel;

class LoginAuthenticator extends DummyAuthenticator
{
    public function login($login, $password): bool
    {

        $user = Pouzivatel::getAll(whereClause: "email = '$login' ");
        if($user != null) {
            if($user[0]->getPassword() === $password) {
                $_SESSION['user'] = $login;
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