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

            if(strlen($password) <= '8' || !preg_match("#[0-9]+#",$password) || !preg_match("#[A-Z]+#",$password) || !preg_match("#[a-z]+#",$password)){
                $_SESSION['message'] = "Password Must Contain At Least 8 Characters, 1 Number, 1 Capital Letter, 1 Lowercase Letter";
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

                if ($registered) {
                    $_SESSION['message'] = "Email already in use";
                    $_SESSION['msg_type'] = "danger";
                    $this->redirect('home', 'registration');
                } else {
                    $newReg = new Reg();
                    $newReg->setEmail($email);
                    $newReg->setFirstName($firstName);
                    $newReg->setLastName($lastName);
                    $newReg->setPassword($password);
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


    public function display()
    {
        $adds = Add::getAll();

        if (!Auth::isAdmin()) {
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
        if (!Auth::isAdmin()) {
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

        if (!Auth::isAdmin()) {
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
        if (!Auth::isAdmin()) {
            $this->redirect('home');
        }


        if (isset($_FILES['file'])) {

            $name1 = $this->request()->getValue('name');
            $product_number= $this->request()->getValue('product_number');
            $price = $this->request()->getValue('price');
            $amount = $this->request()->getValue('amount');

            if (!preg_match("/[0-9]+/",$product_number)) {
                $_SESSION['message'] = "You Entered An Invalid Product_number Format";
                $_SESSION['msg_type'] = "danger";
                $this->redirect('home', 'registration');
                return;
            }

            if (!preg_match("/^[0-9]+[,]+[0-9]{2}$/",$price)) {
                $_SESSION['message'] = "You Entered An Invalid Price Format";
                $_SESSION['msg_type'] = "danger";
                $this->redirect('home', 'registration');
                return;
            }

            if (!preg_match("/^[0-9]+$/",$amount)) {
                $_SESSION['message'] = "You Entered An Invalid Price Format";
                $_SESSION['msg_type'] = "danger";
                $this->redirect('home', 'registration');
                return;
            }


            if(empty($name1) || empty($product_number) || empty($price) ||  empty($amount)) {
                $_SESSION['message'] = "You need to fill every field";
                $_SESSION['msg_type'] = "danger";
                $this->redirect('home', 'addProduct');
            }else{
                if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
                    $name = date('Y-m-d-H-i-s_') . $_FILES['file']['name'];
                    move_uploaded_file($_FILES['file']['tmp_name'], Configuration::UPLOAD_DIR . "$name");

                    $newAdd = new Add();
                    $newAdd->setName($name1);
                    $newAdd->setProductNumber($product_number);
                    $newAdd->setPrice($price);
                    $newAdd->setPriceWithoutVAT($this->request()->getValue('price_withoutVAT'));
                    $newAdd->setAmount($amount);
                    $newAdd->setImage($name);
                    $newAdd->save();

                    $_SESSION['message'] = "Record has been saved!";
                    $_SESSION['msg_type'] = "success";

                    $this->redirect('home', 'display');

                }
            }

        }

    }


    public function delete()
    {
        if (!Auth::isAdmin()) {
            $this->redirect('home');
        }
        $productId = $this->request()->getValue('productid');
        if ($productId > 0) {
            $add = Add::getOne($productId);
            $add->delete();
            $_SESSION['message'] = "Record has been deleted!";
            $_SESSION['msg_type'] = "success";

        }

        $this->redirect('home', 'display');
    }


    public function updateProduct()
    {
        if (!Auth::isAdmin()) {
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
        $pics = Pictures::getAll();
        $_SESSION['id'] = $this->request()->getValue('productid');


        return $this->html(
            [
                'adds' => $adds,
                'comm' => $comm,
                'pics' => $pics

            ]
        );
    }


    public function addReview()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        if (isset($_POST['comment'])) {
            $review = $this->request()->getValue('text');
            if(empty($review)){
                $_SESSION['message'] = "Field needs to be fill";
                $_SESSION['msg_type'] = "danger";
                $this->redirect('home', 'productPage');
            }else{
                $newComm = new Comment();
                $newComm->setProductId($this->request()->getValue('id'));
                $newComm->setText($this->request()->getValue('text'));
                $newComm->save();

                $_SESSION['message'] = "You can Log in now";
                $_SESSION['msg_type'] = "success";

                $this->redirect('home', 'productPage');
            }

        }

    }


    public function addPictures()
    {
        if (!Auth::isAdmin()) {
            $this->redirect('home');
        }

        $adds = Add::getAll();
        $_SESSION['id'] = $this->request()->getValue('productid');

        return $this->html(
            [

                'adds' => $adds
            ]
        );
    }

    public function uploadPictures()
    {
        if (!Auth::isAdmin()) {
            $this->redirect('home');
        }

        if (isset($_FILES['image'])) {

            $filenames = array_filter($_FILES['image']['name']);
            $number = 1;
            if(!empty($filenames)){
                foreach ($_FILES['image']['name'] as $key=>$val){
                    if ($_FILES["image"]["error"][$key] == UPLOAD_ERR_OK) {
                        $name = date('Y-m-d-H-i-s_') . $_FILES['image']['name'][$key];
                        move_uploaded_file($_FILES['image']['tmp_name'][$key], Configuration::UPLOAD_DIR . "$name");
                        $newupload = new Pictures();
                        $newupload->setProductId($this->request()->getValue('id'));
                        $newupload->setImage($name);
                        $newupload->setNumber($number);
                        $newupload->save();
                        $number++;
                    }
                }
                $_SESSION['message'] = "Record has been saved!";
                $_SESSION['msg_type'] = "success";
            }
            else{
                $_SESSION['message'] = "You need to choose one or more files!";
                $_SESSION['msg_type'] = "danger";
                $this->redirect('home', 'addPictures');
                return;
            }
        }

        $this->redirect('home', 'display');
    }
}