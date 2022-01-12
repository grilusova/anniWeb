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

        return $this->html(
            [
                'error' => $this->request()->getValue('error')
            ]
        );
    }

    public function login(){
        $login = $this->request()->getValue('login');
        $password = $this->request()->getValue('password');

        $logged = Auth::login($login,$password);

        if($logged) {
            $this->redirect('home');
        } else {
            $this->redirect('auth','loginForm', ['error' => 'Zlé meno alebo heslo!']);
        }
    }


    public function logout()
    {
        Auth::logout();
        $this->redirect('home');
    }

    public function account()
    {
        $account = Reg::getAll();
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

        $personId = $this->request()->getValue('personid');
        if($personId > 0){
            $account = Reg::getOne($personId);
            $account->delete();
            $_SESSION['message'] = "Record has been deleted!";
            $_SESSION['msg_type'] = "danger";

        }
        self::logout();
        $this->redirect('home', 'display');
    }

}