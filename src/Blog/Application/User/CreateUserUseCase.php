<?php
namespace Blog\Application\User;
use Blog\Domain\User\ADependency;
use Blog\Domain\User\CreateUser;
use Blog\Domain\User\User;
use Blog\Domain\User\UserRepository;


class CreateUserUseCase
{

    private $userRepository;

    public function __construct(UserRepository $userRepository, ADependency $ADependency)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(CreateUser $createUser): User
    {
        $user = $this->userRepository->save($this->createUserToUser($createUser));

        $userIsNull = $user == null;
        if ($userIsNull) {
            throw new \Exception("The user cannot be created"); // Replace with a specific domain exception
        };

        return $user;
    }

    private function createUserToUser(CreateUser $createUser): User
    {
        return new User(
            1,  // Just a fake random id
            $createUser->getEmail(),
            $createUser->getPassword()
        );
    }

}