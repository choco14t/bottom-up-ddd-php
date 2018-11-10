<?php

namespace BottomUpDDD\Domain\Users;

interface UserFactoryInterface
{
    public function createUser(UserName $userName, FullName $fullName): User;
}
