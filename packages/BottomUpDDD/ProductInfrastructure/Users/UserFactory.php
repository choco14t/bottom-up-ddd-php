<?php

namespace BottomUpDDD\ProductionInfrastructure\Users;

use BottomUpDDD\Domain\Users\UserFactoryInterface;
use BottomUpDDD\Domain\Users\UserName;
use BottomUpDDD\Domain\Users\FullName;
use BottomUpDDD\Domain\Users\User;

class UserFactory implements UserFactoryInterface
{
    public function createUser(UserName $userName, FullName $fullName): User
    {
        return new User(
            $userName,
            $fullName
        );
    }
}
