<?php

namespace BottomUpDDD\Domain\Users;

interface UserRepositoryInterface
{
    /**
     * @param UserId $userId
     * @return User|null
     */
    public function findByUserId(UserId $userId): ?User;

    /**
     * @param UserName $userName
     * @return User|null
     */
    public function findByUserName(UserName $userName): ?User;

    /**
     * @return User[]
     */
    public function findAll();

    /**
     * @param User $user
     * @return void
     */
    public function save(User $user);

    /**
     * @param UserId $userId
     * @return void
     */
    public function delete(UserId $userId);
}
