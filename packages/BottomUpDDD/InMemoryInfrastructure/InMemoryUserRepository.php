<?php

namespace BottomUpDDD\InMemoryInfrastructure;

use BottomUpDDD\Domain\Users\UserRepositoryInterface;
use BottomUpDDD\Domain\Users\User;
use BottomUpDDD\Domain\Users\UserId;
use BottomUpDDD\Domain\Users\UserName;

final class InMemoryUserRepository implements UserRepositoryInterface
{
    public function findByUserId(UserId $userId)
    {
    }

    public function findByUserName(UserName $userName)
    {
    }

    public function findAll()
    {
    }

    public function save(User $user)
    {
    }

    public function delete(User $user)
    {
    }
}
