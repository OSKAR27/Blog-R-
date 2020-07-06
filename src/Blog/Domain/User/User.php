<?php
namespace Blog\Domain\User;


class User
{

    private $id;

    private $email;

    private $password;

    public function __construct(int $id,string  $email,string $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

}