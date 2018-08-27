<?php

namespace BottomUpDDD\InMemoryInfrastructure;

use BottomUpDDD\Domain\Users\UserRepositoryInterface;
use BottomUpDDD\Domain\Users\User;
use BottomUpDDD\Domain\Users\UserId;
use BottomUpDDD\Domain\Users\UserName;

final class InMemoryUserRepository implements UserRepositoryInterface
{
    /** @var User[] */
    private $data = [];

    public function findByUserId(UserId $userId)
    {
        $id = $userId->value();

        if (array_key_exists($id, $data)) {
            return $data[$id];
        }

        return null;
    }

    public function findByUserName(UserName $userName)
    {
        foreach ($this->data as $user) {
            if ($user->userName()->equals($userName)) {
                return $user;
            }
        }

        return null;
    }

    public function findAll()
    {
        return array_values($data);
    }

    public function save(User $user)
    {
        $this->data[$user->id()->value()] = $user;
    }

    public function delete(UserId $userId)
    {
        unset($this->data[$userId->value()]);
    }
}
