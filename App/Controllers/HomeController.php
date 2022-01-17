<?php

namespace App\Controllers;

use App\Auth;
use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Models\Add;
use App\Models\Comment;
use App\Models\Reg;
use App\Models\Pictures;

/**
 * Class HomeController
 * Example of simple controller
 * @package App\Controllers
 */
class HomeController extends AControllerRedirect
{

    public function index()
    {

        return $this->html();
    }


    public function FAQ()
    {
        return $this->html();
    }


    public function registration()
    {
        if (Auth::isLogged()) {
            $this->redirect('home');
        }

        return $this->html(
            [
                'error' => $this->request()->getValue('error')
            ]
        );
    }


    public function register()
    {
        if (Auth::isLogged()) {
            $this->redirect('home');
        }

        if (isset($_POST['submit'])) {

            $email = $this->request()->getValue('email');
            $password = $this->request()->getValue('password');
            $lastName = $this->request()->getValue('lastName');
            $firstName = $this->request()->getValue('firstName');

            if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
                $_SESSION['message'] = "You Entered An Invalid Email Format";
                $_SESSION['msg_type'] = "danger";
                $this->redirect('home', 'registration');
                return;
            }

            if(strlen($password) < '8' || !preg_match("#[0-9]+#",$password) || !preg_match("#[A-Z]+#",$password) || !preg_match("#[a-z]+#",$password)){
                $_SESSION['message'] = "123514Password Must Contain At Least 8 Characters, 1 Number, 1 Capital Letter, 1 Lowercase Letter";
                $_SESSION['msg_type'] = "danger";
                $this->redirect('home', 'registration');
                return;
            }

            if(empty($email) || empty($password) || empty($lastName) || empty($firstName)){
                $_SESSION['message'] = "You need to fill every field";
                $_SESSION['msg_type'] = "danger";
                $this->redirect('home', 'registration');

            }else{
                $registered = self::registered($email);
                $hash = password_hash($password, PASSWORD_DEFAULT);
                if ($registered) {
                    $_SESSION['message'] = "Email already in use";
                    $_SESSION['msg_type'] = "danger";
                    $this->redirect('home', 'registration');
                } else {
                    $newReg = new Reg();
                    $newReg->setEmail($email);
                    $newReg->setFirstName($firstName);
                    $newReg->setLastName($lastName);
                    $newReg->setPassword($hash);
                    $newReg->save();

                    $_SESSION['message'] = "You can Log in now";
                    $_SESSION['msg_type'] = "success";

                    $this->redirect('auth', 'loginForm');
                }
            }

        }

    }

    public static function registered($email)
    {
        $all = Reg::getAll();
        foreach ($all as $a) {
            if ($email == $a->getEmail()) {
                return true;
            }
        }
        return false;
    }



}