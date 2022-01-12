<?php

namespace App\Models;
use App\Core\Model;

class Comment extends Model
{

    public function __construct(
        public int $id = 0,
        public int $product_id = 0,
        public ?string $text = null)
    {

    }

    static public function setDbColumns()
    {
        return['id', 'product_id', 'text'];
    }

    static public function setTableName()
    {
        return "comments";
    }





    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): void
    {
        $this->text = $text;
    }




    public function getProductId(): int
    {
        return $this->product_id;
    }

    public function setProductId(int $product_id): void
    {
        $this->product_id = $product_id;
    }





    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }


}