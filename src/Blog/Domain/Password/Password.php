<?php
namespace Blog\Domain\Password;

class Password
{
    private $password;

    public function __construct(string $password)
    {
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function checkMaxLimit(): bool
    {
        if(strlen($this->password)<28)
        {
            return true;
        }

        return false;
    }

    public function checkMinLimit(): bool
    {
        if(strlen($this->password)>1)
        {
            return true;
        }

        return false;
    }

    public function containsCharacter(): bool
    {
        if(strpos($this->password, 'a'))
        {
            return true;
        }

        return false;
    }

    public function containNumber(): bool
    {
        if(!filter_var($this->password, FILTER_VALIDATE_INT))
        {
            return true;
        }

        return false;
    }
}