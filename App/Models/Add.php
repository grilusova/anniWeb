<?php

namespace App\Models;
use App\Core\Model;

class Add extends Model
{

    public function __construct(
        public int $id = 0,
        public ?string $name = null,
        public ?string $product_number = null,
        public ?string $price = null,
        public ?string $price_withoutVAT = null,
        public int $amount = 0,
        public ?string $image = null)
    {

    }

    static public function setDbColumns()
    {
        return['id', 'name', 'product_number', 'price', 'price_withoutVAT', 'amount', 'image'];
    }

    static public function setTableName()
    {
        return "products";
    }



    public function getId(): int
    {
        return $this->id;
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }





    public function getProductNumber(): ?string
    {
        return $this->product_number;
    }

    public function setProductNumber(?string $product_number): void
    {
        $this->product_number = $product_number;
    }





    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }






    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): void
    {
        $this->price = $price;
    }





    public function getPriceWithoutVAT(): ?string
    {
        return $this->price_withoutVAT;
    }

    public function setPriceWithoutVAT(?string $price_withoutVAT): void
    {
        $this->price_withoutVAT = $price_withoutVAT;
    }



    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }




    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }
}