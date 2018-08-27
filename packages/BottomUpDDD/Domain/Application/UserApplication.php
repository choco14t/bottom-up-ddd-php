<?php

namespace BottomUpDDD\Domain\Application;

use Exception;
use BottomUpDDD\Domain\Users\UserRepositoryInterface;
use BottomUpDDD\Domain\Users\UserService;
use BottomUpDDD\Domain\Users\User;
use BottomUpDDD\Domain\Users\FullName;
use BottomUpDDD\Domain\Users\UserName;
use BottomUpDDD\Domain\Users\UserId;
use BottomUpDDD\Domain\Application\Models\UserModel;
use BottomUpDDD\Domain\Application\Models\UserSummaryModel;

final class UserApplication
{
    /** @var UserRepositoryInterface */
    private $userRepository;

    /** @var UserService */
    private $userService;

    /**
     * @param UserRepositoryInterface $userRepositroy
     */
    public function __construct(UserRepositoryInterface $userRepositroy)
    {
        $this->userRepository = $userRepositroy;
        $this->userService = new UserService($userRepositroy);
    }

    /**
     * @param string $userName
     * @param string $firstName
     * @param string $familyName
     * @return void
     */
    public function registerUser(string $userName, string $firstName, string $familyName): void
    {
        $user = new User(
            new UserName($userName),
            new FullName($firstName, $familyName)
        );

        if ($this->userService->duplicated($user)) {
            throw new Exception('Duplicate user.');
        }

        $this->userRepository->save($user);
    }

    /**
     * @param string $id
     * @param string $userName
     * @param string $firstName
     * @param string $familyName
     * @return void
     */
    public function changeUserInfo(
        string $id,
        string $userName,
        string $firstName,
        string $familyName
    ) {
        $targetId = new UserId($id);
        $target = $this->userRepository->findByUserId($targetId);

        if ($target === null) {
            throw new Exception('User not found. target id: ' . $id);
        }

        $newUserName = new UserName($userName);
        $target->changeUserName($newUserName);
        $newName = new FullName($firstName, $familyName);
        $target->changeName($newName);
        $this->userRepository->save($target);
    }

    /**
     * @param string $id
     * @return void
     */
    public function deleteUser(string $id)
    {
        $targetId = new UserId($id);
        $target = $this->userRepository->findByUserId($targetId);

        if ($target === null) {
            throw new Exception('User not found. target id: ' . $id);
        }

        $this->userRepository->delete($target->id());
    }

    /**
     * @param string $id
     * @return UserModel
     */
    public function getUserInfo(string $id)
    {
        $userId = new UserId($id);
        $target = $this->userRepository->findByUserId($userId);

        if ($target === null) {
            return null;
        }

        return new UserModel($target);
    }

    public function getUserList()
    {
        $users = $this->userRepository->findAll();

        if ($users === null) {
            return [];
        }

        return array_map(function ($user) {
            return new UserSummaryModel($user);
        }, $users);
    }
}
