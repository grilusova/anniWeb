<?php

namespace App\Models;
use App\Core\Model;

class Reg extends Model
{

    public function __construct(
        public int $id = 0,
        public ?string $email = null,
        public ?string $firstName = null,
        public ?string $lastName = null,
        public ?string $password = null)
    {

    }

    static public function setDbColumns()
    {
        return['id', 'email', 'firstName', 'lastName', 'password'];
    }

    static public function setTableName()
    {
        return "reg";
    }


    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }





    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }





    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }




    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function getEmail(): ?string
    {
        return $this->email;
    }


    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }


}