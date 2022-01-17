<?php

namespace App;

use App\Models\Reg;

class Auth
{

    public static function login($login, $password)
    {
        $all = Reg::getAll('email=?', [$_POST['email']]);
        foreach ($all as $a) {
            if (($login == $a->getEmail()) && ($password == $a->getPassword())) {
                $_SESSION["name"] = $login;
                $_SESSION["firstname"] = $a->getFirstName();
                $_SESSION["lastname"] = $a->getLastName();
                $_SESSION["id"] = $a->getId();
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

    public static function getFirstName1()
    {
        return (Auth::isLogged() ? $_SESSION['firstname'] : "");
    }

    public static function getLastName1()
    {
        return (Auth::isLogged() ? $_SESSION['lastname'] : "");
    }

    public static function getId1()
    {
        return (Auth::isLogged() ? $_SESSION['id'] : "");
    }

    public static function logout()
    {
        unset($_SESSION['name']);
        session_destroy();
    }

}