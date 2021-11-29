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
        public int $amount = 0)
    {

    }

    static public function setDbColumns()
    {
        return['id', 'name', 'product_number', 'price', 'price_withoutVAT', 'amount'];
    }

    static public function setTableName()
    {
        return "products";
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getProductNumber(): ?string
    {
        return $this->product_number;
    }

    /**
     * @param string|null $product_number
     */
    public function setProductNumber(?string $product_number): void
    {
        $this->product_number = $product_number;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getPrice(): ?string
    {
        return $this->price;
    }

    /**
     * @param string|null $price
     */
    public function setPrice(?string $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string|null
     */
    public function getPriceWithoutVAT(): ?string
    {
        return $this->price_withoutVAT;
    }

    /**
     * @param string|null $price_withoutVAT
     */
    public function setPriceWithoutVAT(?string $price_withoutVAT): void
    {
        $this->price_withoutVAT = $price_withoutVAT;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }
}