<?php

namespace App\Controllers;

use App\Auth;
use App\Core\Responses\Response;
use App\Models\Reg;

class AuthController extends AControllerRedirect
{

    /**
     * @inheritDoc
     */
    public function index()
    {
        // TODO: Implement index() method.
    }

    public function loginForm(){

        if (Auth::isLogged()) {
            $this->redirect('home');
        }

        return $this->html(
            [
                'error' => $this->request()->getValue('error')
            ]
        );
    }

    public function login(){
        $login = $this->request()->getValue('email');
        $password = $this->request()->getValue('password');

        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$login)) {
            $_SESSION['message'] = "You Entered An Invalid Email Format";
            $_SESSION['msg_type'] = "danger";
            $this->redirect('auth','loginForm');
            return;
        }

        if(empty($login) || empty($password)){
            $this->redirect('auth','loginForm', ['error' => 'Login and Password mandatory']);
        }else{
            $logged = Auth::login($login,$password);

            if($logged) {
                $this->redirect('home');
            } else {
                $this->redirect('auth','loginForm', ['error' => 'Wrong username or password!']);
            }
        }
    }


    public function logout()
    {
        Auth::logout();
        $this->redirect('home');
    }

    public function account()
    {
        $account = Reg::getAll('email=?', [$_SESSION['name']]);
        return $this->html(
            [
                'account' => $account

            ]
        );
    }

    public function deleteAccount()
    {

        if(!Auth::isLogged()){
            $this->redirect('home');
        }

        Auth::setId1();
        $personId = $_SESSION['id'];
        if($personId > 0){
            $account = Reg::getOne($personId);
            $account->delete();
            $_SESSION['message'] = "Record has been deleted!";
            $_SESSION['msg_type'] = "danger";

        }
        self::logout();
        $this->redirect('product', 'display');
    }

}