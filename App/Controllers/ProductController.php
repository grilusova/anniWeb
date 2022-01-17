<?php

namespace App\Controllers;

use App\Auth;
use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Models\Add;
use App\Models\Comment;
use App\Models\Pictures;
class ProductController extends AControllerRedirect
{


    public function index()
    {
        // TODO: Implement index() method.
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
            $priceP = str_replace(",", ".", $price);
            $pom = $priceP * 0.2;
            $price_w_V = $priceP - $pom;
            $price_w_VAT = str_replace(".", ",", number_format($price_w_V,2));

            if(!preg_match("/\.(gif|png|jpg)$/", $_FILES['file']['name'])) {
                $_SESSION['message'] = "Wrong type of file";
                $_SESSION['msg_type'] = "danger";
                $this->redirect('product', 'addProduct');
                return;
            }

            if (!preg_match("/[0-9]+/",$product_number)) {
                $_SESSION['message'] = "You Entered An Invalid Product_number Format";
                $_SESSION['msg_type'] = "danger";
                $this->redirect('product', 'addProduct');
                return;
            }

            if (!preg_match("/^[0-9]+[,]+[0-9]{2}$/",$price)) {
                $_SESSION['message'] = "You Entered An Invalid Price Format";
                $_SESSION['msg_type'] = "danger";
                $this->redirect('product', 'addProduct');
                return;
            }

            if (!preg_match("/^[0-9]+$/",$amount)) {
                $_SESSION['message'] = "You Entered An Invalid Amount Format";
                $_SESSION['msg_type'] = "danger";
                $this->redirect('product', 'addProduct');
                return;
            }


            if(empty($name1) || empty($product_number) || empty($price) ||  empty($amount)) {
                $_SESSION['message'] = "You need to fill every field";
                $_SESSION['msg_type'] = "danger";
                $this->redirect('product', 'addProduct');
            }else{
                if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
                    $name = date('Y-m-d-H-i-s_') . $_FILES['file']['name'];
                    move_uploaded_file($_FILES['file']['tmp_name'], Configuration::UPLOAD_DIR . "$name");

                    $newAdd = new Add();
                    $newAdd->setName($name1);
                    $newAdd->setProductNumber($product_number);
                    $newAdd->setPrice($price);
                    $newAdd->setPriceWithoutVAT($price_w_VAT);
                    $newAdd->setAmount($amount);
                    $newAdd->setImage($name);
                    $newAdd->save();

                    $_SESSION['message'] = "Record has been saved!";
                    $_SESSION['msg_type'] = "success";

                    $this->redirect('product', 'display');

                }
            }

        }

    }


    public function delete()
    {
        if (!Auth::isAdmin()) {
            $this->redirect('home');
        }
        $pics = Pictures::getAll();
        $comm = Comment::getAll();
        $productId = $this->request()->getValue('productid');
        if ($productId > 0) {
            $add = Add::getOne($productId);
            foreach ($pics as $p){
                if($p->product_id == $productId){
                    $p->delete();
                }
            }
            foreach ($comm as $c){
                if($c->product_id == $productId){
                    $c->delete();
                }
            }
            $add->delete();
            $_SESSION['message'] = "Record has been deleted!";
            $_SESSION['msg_type'] = "success";

        }

        $this->redirect('product', 'display');
    }


    public function updateProduct()
    {
        if (!Auth::isAdmin()) {
            $this->redirect('home');
        }

        $name = $this->request()->getValue('name');
        $product_number= $this->request()->getValue('product_number');
        $amount = $this->request()->getValue('amount');
        $price = $this->request()->getValue('price');
        $priceP = str_replace(",", ".", $price);
        $pom = $priceP * 0.2;
        $price_w_V = $priceP - $pom;
        $price_w_VAT = str_replace(".", ",", number_format($price_w_V,2));


        if (!preg_match("/[0-9]+/",$product_number)) {
            $_SESSION['message'] = "You Entered An Invalid Product_number Format";
            $_SESSION['msg_type'] = "danger";
            $this->redirect('product', 'update');
            return;
        }

        if (!preg_match("/^[0-9]+[,]+[0-9]{2}$/",$price)) {
            $_SESSION['message'] = "You Entered An Invalid Price Format";
            $_SESSION['msg_type'] = "danger";
            $this->redirect('product', 'update');
            return;
        }

        if (!preg_match("/^[0-9]+$/",$amount)) {
            $_SESSION['message'] = "You Entered An Invalid Price Format";
            $_SESSION['msg_type'] = "danger";
            $this->redirect('product', 'update');
            return;
        }


        if(empty($name) || empty($product_number) || empty($price) ||  empty($amount)) {
            $_SESSION['message'] = "You need to fill every field";
            $_SESSION['msg_type'] = "danger";
            $this->redirect('product', 'update');
        }else{
            $productId = $this->request()->getValue('productid');
            if ($productId > 0) {
                $add = Add::getOne($productId);
                $add->setName($name);
                $add->setProductNumber($product_number);
                $add->setPrice($price);
                $add->setPriceWithoutVAT($price_w_VAT);
                $add->setAmount($amount);
                $add->save();


                $_SESSION['message'] = "Record has been updated!";
                $_SESSION['msg_type'] = "success";
                $this->redirect('product', 'display');
            }
        }
    }


    public function singleProduct()
    {
        $adds = Add::getAll();
        $pics = Pictures::getAll();
        $_SESSION['id'] = $this->request()->getValue('productid');


        return $this->html(
            [
                'adds' => $adds,
                'pics' => $pics

            ]
        );
    }

    public function getAllComments()
    {
        $comm = Comment::getAll();
        return $this->json($comm);
    }


    public function addReview()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }

        $review = $this->request()->getValue('text');
        $productId = $this->request()->getValue('id');

        if(strlen($review)<3) {
            return $this->json('error');
        }

        $newComm = new Comment();
        $newComm->text = $review;
        $newComm->product_id = $productId;
        $newComm->save();
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

        foreach ($_FILES['image']['name'] as $k=>$v) {
            if(!preg_match("/\.(gif|png|jpg)$/", $_FILES['image']['name'][$k])) {
                $_SESSION['message'] = "Wrong type of file";
                $_SESSION['msg_type'] = "danger";
                $this->redirect('product', 'display');
                return;
            }
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
                $this->redirect('product', 'addPictures');
                return;
            }
        }

        $this->redirect('product', 'display');
    }

}