<?php
namespace BlogUnit;
use Blog\Domain\Email\Email;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class EmailTest extends \PHPUnit_Framework_TestCase 
{
    protected $email;
 
    protected function setUp()
    {
        $this->email = new Email("oscar.guardado@demo.com");
    }

    /** @test */
   public function shouldCreateAnEmailObjectWhenAValidEmailIsGiven()
   {
       $this->assertInstanceOf(Email::class, $this->email);
   }

    /** @test */
    public function shouldCreateAnEmailObjectWhenAValidOtherEmailIsGiven()
    {
        $this->assertInstanceOf(Email::class, 'oscar.other@gmail.com');
    }


   /** @test */
   public function shouldThrowAnExceptionWhenAnInvalidEmailIsGiven()
   {
       $this->expectException(InvalidArgumentException::class);
       $this->email = new Email("demo@@demo.com");
   }

   /** @test */
   public function shouldThrowAnExceptionWhenAnvalidEmailIsGiven()
   {
       $this->expectException(InvalidArgumentException::class);
       $this->email = new Email("oscar@demo.com");
   }

   /** @test */
   public function shouldThrowAnExceptionWhenAnInvalidOtherEmailIsGiven()
   {
       $this->expectException(InvalidArgumentException::class);
       $this->email = new Email("oscar.demo.com");
   }

    /** @test */
    public function shouldThrowAnExceptionWhenAnInvalidCharacterEmailIsGiven()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->email = new Email("oscar$@demo..com");
    }

   /** @test */
   public function shouldContainsValueCorrect()
   {
       $this->stringContains('@',$this->email );
   }
}
