<?php

namespace App\Controllers;

use App\Auth;
use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Models\Add;

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

    public function login()
    {
        return $this->html(
            []
        );
    }

    public function FAQ()
    {
        return $this->html(
            []
        );
    }

    public function display()
    {
        $adds = Add::getAll();

        if (!Auth::isLogged()){
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
        if (!Auth::isLogged()){
            $this->redirect('home');
        }
        return $this->html();
    }

    public function update()
    {
        $adds = Add::getAll();
        if (!Auth::isLogged()){
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
        if(!Auth::isLogged()){
            $this->redirect('home');
        }

        if(isset($_POST['submit'])) {
            $newAdd = new Add();
            $newAdd->setName($this->request()->getValue('name'));
            $newAdd->setProductNumber($this->request()->getValue('product_number'));
            $newAdd->setPrice($this->request()->getValue('price'));
            $newAdd->setPriceWithoutVAT($this->request()->getValue('price_withoutVAT'));
            $newAdd->setAmount($this->request()->getValue('amount'));
            $newAdd->save();
            }
        $this->redirect('home', 'addProduct');
    }


    public function delete()
    {
        $productId = $this->request()->getValue('productid');
        if($productId > 0){
            $add = Add::getOne($productId);
            $add->delete();

        }

        $this->redirect('home', 'display');
    }


    public function updateProduct()
    {

        $productId = $this->request()->getValue('productid');
        if($productId > 0){
            $add = Add::getOne('productid');
            $add->setName($this->request()->getValue('name'));
            $add->setProductNumber($this->request()->getValue('product_number'));
            $add->setPrice($this->request()->getValue('price'));
            $add->setPriceWithoutVAT($this->request()->getValue('price_withoutVAT'));
            $add->setAmount($this->request()->getValue('amount'));
            $add->save();



        }

        $this->redirect('home', 'display');
    }

}