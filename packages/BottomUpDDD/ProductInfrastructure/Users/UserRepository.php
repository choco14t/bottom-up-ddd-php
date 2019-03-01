<?php

namespace BottomUpDDD\ProductionInfrastructure;

use BottomUpDDD\Domain\Users\UserRepositoryInterface;
use BottomUpDDD\Domain\Users\User;
use BottomUpDDD\Domain\Users\UserId;
use BottomUpDDD\Domain\Users\UserName;
use BottomUpDDD\ProductionInfrastructure\Eloquents\UserEloquent;
use BottomUpDDD\Domain\Users\FullName;

/**
 * Class UserRepository
 * @package BottomUpDDD\ProductionInfrastructure
 */
final class UserRepository implements UserRepositoryInterface
{
    /** @var UserEloquent */
    private $userEloquent;

    /**
     * UserRepository constructor.
     * @param UserEloquent $userEloquent
     */
    public function __construct(UserEloquent $userEloquent)
    {
        $this->userEloquent = $userEloquent;
    }

    /**
     * @param UserId $userId
     * @return User|null
     */
    public function findByUserId(UserId $userId): ?User
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
    public function findByUserName(UserName $userName): ?User
    {
        $target = $this->userEloquent->findByUserName($userName);

        return $target;
    }

    /**
     * @return User[]
     */
    public function findAll()
    {
        $users = $this->userEloquent
            ->all()
            ->map(function (UserEloquent $userEloquent) {
                return new User(
                    new UserName($userEloquent->user_name),
                    new FullName(
                        $userEloquent->first_name,
                        $userEloquent->family_name
                    ),
                    new UserId($userEloquent->id)
                );
            })->toArray();

        return $users;
    }

    /**
     * @param User $user
     */
    public function save(User $user)
    {
        $this->userEloquent->persist($user);
    }

    /**
     * @param UserId $userId
     */
    public function delete(UserId $userId)
    {
        $this->userEloquent->deleteByUserId($userId);
    }
}
