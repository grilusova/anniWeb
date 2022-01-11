<?php

namespace App;

use App\Models\Reg;

class Auth
{

    public static function login($login, $password)
    {
        $all = Reg::getAll();
        foreach ($all as $a) {
            if (($login == $a->getEmail()) && ($password == $a->getPassword())) {
                $_SESSION["name"] = $login;
                return true;
            }
        }
            return false;
    }


    public static function isLogged()
    {
        return isset($_SESSION['name']);
    }

    public static function isAdmin()
    {

        if (self::getName() == "admin@gmail.com") {
            return true;
        }
    }

    public static function getName()
    {
        return (Auth::isLogged() ? $_SESSION['name'] : "");
    }

    public static function logout()
    {
        unset($_SESSION['name']);
        session_destroy();
    }

}