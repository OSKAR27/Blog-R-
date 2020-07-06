<?php
namespace BlogUnit;
use Blog\Domain\Password\Password;

class PasswordTest extends \PHPUnit_Framework_TestCase 
{
    protected $password;


    protected function setUp()
    {
        $this->password = new Password("1234561a847");
    }

    /** @test */
   public function shouldCreateAnPasswordObject()
   {
       $this->assertInstanceOf(Password::class, $this->password);
   }

    /** @test */
    public function shouldCountCharacterValidMaxLimit()
    {
        $this->assertTrue($this->password->checkMaxLimit());
    }

    /** @test */
    public function shouldCountCharacterValidMinLimit()
    {
        $this->assertTrue($this->password->checkMinLimit());
    }

    /** @test */
    public function shouldCountCharacterString()
    {
        $this->assertTrue($this->password->containsCharacter());
    }

     /** @test */
    public function shouldNotContainsCharacterString()
    {
        $this->password = new Password("123456789");
        $this->assertTrue($this->password->containsCharacter());
    }
 
    /** @test */
    public function shouldInvalidExceedLimitCharacterString()
    {
        $this->password = new Password("123456789cadenamuylargajdkridj");
        $this->assertFalse($this->password->checkMaxLimit());
    }

    /** @test */
    public function shouldNotContainsNumber()
    {
        $this->password = new Password("cadenamuylargajdkridj");
        $this->assertTrue($this->password->containNumber());
    }

     /** @test */
    public function shouldInvalidMinLimitCharacterString()
    {
        $this->password = new Password("12");
        $this->assertFalse($this->password->checkMinLimit());
    }

    /** @test */
    public function shouldContainsNumber()
    {
        $this->assertTrue($this->password->containNumber());
    }
}
