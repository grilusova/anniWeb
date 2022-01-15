<?php

namespace App\Models;
use App\Core\Model;

class Pictures extends Model
{

    public function __construct(
        public int $id = 0,
        public int $product_id = 0,
        public ?string $image = null,
        public int $number = 0)
    {

    }

    static public function setDbColumns()
    {
        return['id', 'product_id', 'image', 'number'];
    }

    static public function setTableName()
    {
        return "pictures";
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
     * @return int
     */
    public function getProductId(): int
    {
        return $this->product_id;
    }

    /**
     * @param int $product_id
     */
    public function setProductId(int $product_id): void
    {
        $this->product_id = $product_id;
    }


    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param int $number
     */
    public function setNumber(int $number): void
    {
        $this->number = $number;
    }


}