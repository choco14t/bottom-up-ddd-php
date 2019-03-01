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

    /**
     * @param UserId $userId
     * @return User|null
     */
    public function findByUserId(UserId $userId): ?User
    {
        $id = $userId->value();

        if (array_key_exists($id, $this->data)) {
            return $this->data[$id];
        }

        return null;
    }

    /**
     * @param UserName $userName
     * @return User|null
     */
    public function findByUserName(UserName $userName): ?User
    {
        foreach ($this->data as $user) {
            if ($user->userName()->equals($userName)) {
                return $user;
            }
        }

        return null;
    }

    /**
     * @return User[]
     */
    public function findAll()
    {
        return array_values($this->data);
    }

    /**
     * @param User $user
     * @return void
     */
    public function save(User $user)
    {
        $this->data[$user->id()->value()] = $user;
    }

    /**
     * @param UserId $userId
     * @return void
     */
    public function delete(UserId $userId)
    {
        unset($this->data[$userId->value()]);
    }
}
