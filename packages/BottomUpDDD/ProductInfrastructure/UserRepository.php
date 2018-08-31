<?php

namespace BottomUpDDD\ProductionInfrastructure;

use BottomUpDDD\Domain\Users\UserRepositoryInterface;
use BottomUpDDD\Domain\Users\User;
use BottomUpDDD\Domain\Users\UserId;
use BottomUpDDD\Domain\Users\UserName;
use BottomUpDDD\ProductionInfrastructure\Eloquents\UserEloquent;
use BottomUpDDD\Domain\Users\FullName;

final class UserRepository implements UserRepositoryInterface
{
    /** @var UserEloquent */
    private $userEloquent;

    public function __construct(UserEloquent $userEloquent)
    {
        $this->userEloquent = $userEloquent;
    }

    /**
     * @param UserId $userId
     * @return User|null
     */
    public function findByUserId(UserId $userId)
    {
        $target = $this->userEloquent->find($userId->value());

        if ($target === null) {
            return null;
        }

        return new User(
            new UserName($target->user_name),
            new FullName($target->first_name, $target->family_name),
            $userId
        );
    }

    /**
     * @param UserName $userName
     * @return User|null
     */
    public function findByUserName(UserName $userName)
    {
        $target = $this->userEloquent->findByUserName($userName);

        return $target;
    }

    public function findAll()
    {
        $users = $this->userEloquent->all();
    }

    public function save(User $user)
    {
        $this->userEloquent->persist($user);
    }

    public function delete(UserId $userId)
    {
        $this->userEloquent->deleteByUserId($userId);
    }
}
