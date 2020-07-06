<?php
namespace Blog\Domain\User;


interface UserRepository
{

    /**
     * @return User | null
     */
    public function save(User $user);

}