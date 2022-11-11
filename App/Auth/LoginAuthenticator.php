<?php

namespace App\Auth;

class LoginAuthenticator extends DummyAuthenticator
{
    public function login($login, $password): bool
    {
        if ($login == $password) {
            $_SESSION['user'] = $login;
            return true;
        }

        return false;
    }

}