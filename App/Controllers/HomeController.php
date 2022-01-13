<?php

namespace App\Controllers;

use App\Auth;
use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Models\Add;
use App\Models\Comment;
use App\Models\Reg;

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

    public function productPage()
    {
        $adds = Add::getAll();
        return $this->html(
            [
                'adds' => $adds
            ]
        );
    }


    public function registration()
    {
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
            $registered = self::registered($email);

            if ($registered) {
                $_SESSION['message'] = "Email already in use";
                $_SESSION['msg_type'] = "danger";
                $this->redirect('home', 'registration');
            } else {
                $newReg = new Reg();
                $newReg->setEmail($this->request()->getValue('email'));
                $newReg->setFirstName($this->request()->getValue('firstName'));
                $newReg->setLastName($this->request()->getValue('lastName'));
                $newReg->setPassword($this->request()->getValue('password'));
                $newReg->save();

                $_SESSION['message'] = "You can Log in now";
                $_SESSION['msg_type'] = "success";

                $this->redirect('auth', 'loginForm');
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


    public function display()
    {
        $adds = Add::getAll();

        if (!Auth::isLogged()) {
            $this->redirect('home');
        }

        return $this->html(
            [
                'adds' => $adds
            ]
        );
    }

    public function addProduct()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        return $this->html(
            [
                'error' => $this->request()->getValue('error')
            ]
        );
    }

    public function update()
    {
        $adds = Add::getAll();
        $_SESSION['id'] = $this->request()->getValue('productid');

        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        return $this->html(
            [
                'adds' => $adds

            ]
        );
    }

    public function upload()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }

        if (isset($_FILES['file'])) {

            if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
                $name = date('Y-m-d-H-i-s_') . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], Configuration::UPLOAD_DIR . "$name");

                $newAdd = new Add();
                $newAdd->setName($this->request()->getValue('name'));
                $newAdd->setProductNumber($this->request()->getValue('product_number'));
                $newAdd->setPrice($this->request()->getValue('price'));
                $newAdd->setPriceWithoutVAT($this->request()->getValue('price_withoutVAT'));
                $newAdd->setAmount($this->request()->getValue('amount'));
                $newAdd->setImage($name);
                $newAdd->save();

                $_SESSION['message'] = "Record has been saved!";
                $_SESSION['msg_type'] = "success";

            }

        }

        $this->redirect('home', 'display');

    }


    public function delete()
    {


        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        $productId = $this->request()->getValue('productid');
        if ($productId > 0) {
            $add = Add::getOne($productId);
            $add->delete();
            $_SESSION['message'] = "Record has been deleted!";
            $_SESSION['msg_type'] = "danger";

        }

        $this->redirect('home', 'display');
    }


    public function updateProduct()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }

        $productId = $this->request()->getValue('productid');
        if ($productId > 0) {
            $add = Add::getOne($productId);
            $add->setName($this->request()->getValue('name'));
            $add->setProductNumber($this->request()->getValue('product_number'));
            $add->setPrice($this->request()->getValue('price'));
            $add->setPriceWithoutVAT($this->request()->getValue('price_withoutVAT'));
            $add->setAmount($this->request()->getValue('amount'));
            $add->save();


            $_SESSION['message'] = "Record has been saved!";
            $_SESSION['msg_type'] = "success";


        }

        $this->redirect('home', 'display');
    }


    public function singleProduct()
    {
        $adds = Add::getAll();
        $comm = Comment::getAll();
        $_SESSION['id'] = $this->request()->getValue('productid');

        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        return $this->html(
            [
                'adds' => $adds,
                'comm' => $comm

            ]
        );
    }


    public function addReview()
    {

        if (isset($_POST['comment'])) {
            $newComm = new Comment();
            $newComm->setProductId($this->request()->getValue('id'));
            $id = $this->request()->getValue('id');
            $newComm->setText($this->request()->getValue('text'));
            $newComm->save();

            $_SESSION['message'] = "You can Log in now";
            $_SESSION['msg_type'] = "success";


            $this->redirect('home', 'productPage');
        }

    }
}