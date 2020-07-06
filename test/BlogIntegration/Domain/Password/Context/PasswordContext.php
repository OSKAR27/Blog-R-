<?php

namespace BlogIntegration\Domain\Password\Context;

use Behat\Behat\Context\Context;
use Blog\Domain\Password\Password;
use PHPUnit_Framework_Assert;

final class PasswordContext implements Context

{
    /**
     * @Given /a value (\b.+\b) that I don't really need/
     */
    public function aValueThatIDonTReallyNeed($value)
    {
        $this->useless_value = $value;
    }

    /**
     * @Given /temporary storing another value (\b.+\b)/
     */
    public function temporaryStoringAnotherValue($value)
    {
        $this->useful = $value;
    }

}