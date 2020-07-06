<?php
namespace BlogUnit\Application\User;


use Blog\Domain\User\ADependency;
use Blog\Domain\User\CreateUser;
use Blog\Application\User\CreateUserUseCase;
use Blog\Domain\User\User;
use Blog\Domain\User\UserRepository;
use PHPUnit_Framework_MockObject_MockObject;
use PHPUnit_Framework_TestCase;

class CreateUserUseCaseTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var CreateUserUseCase
     */
    private $createUserUseCase;

    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    private $userRepositoryMock;

    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    private $aDependencyMock;

    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    private $createUserMock;

    /**
     * @var PHPUnit_Framework_MockObject_MockObject
     */
    private $userMock;


    protected function setUp()
    {

        $this->userRepositoryMock = $this->createMock(UserRepository::class);
        $this->aDependencyMock = $this->createMock(ADependency::class);
        $this->createUserMock = $this->createMock(CreateUser::class);
        $this->userMock = $this->createMock(User::class);

        $this->createUserUseCase = new CreateUserUseCase($this->userRepositoryMock, $this->aDependencyMock);

    }

    protected function tearDown()
    {
        $this->userRepositoryMock = null;
        $this->aDependencyMock = null;
        $this->createUserMock = null;
        $this->userMock = null;

        $this->createUserUseCase = null;
    }

    /** @test */
    public function dummyTest()
    {
        $this->createUserUseCase;
    }

    /** @test */
    public function fakeTest()
    {
        try {

            $this->userRepositoryMock->expects($this->once())->method('save');
            $this->createUserUseCase->execute($this->createUserMock);
        } catch (\Exception $e) {

        }
    }

    /** @test */
    public function stubTest()
    {
        $this->expectException(\Exception::class);
        $this->userRepositoryMock->method('save')->willReturn(null);
        $this->createUserUseCase->execute($this->createUserMock);
    }

}