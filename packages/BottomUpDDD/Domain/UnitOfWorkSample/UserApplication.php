<?php

namespace BottomUpDDD\Domain\UnitOfWorkSample;

use Exception;
use BottomUpDDD\Domain\Users\UserFactoryInterface;
use BottomUpDDD\Domain\Users\UserService;
use BottomUpDDD\Domain\Users\UserName;
use BottomUpDDD\Domain\Users\FullName;
use BottomUpDDD\Domain\Users\UserId;
use BottomUpDDD\Domain\Application\Models\UserModel;
use BottomUpDDD\Domain\Application\Models\UserSummaryModel;

class UserApplication
{
    /** @var UserFactoryInterface */
    private $userFactory;

    /** @var UnitOfWorkInterface */
    private $uow;

    /** @var UserService */
    private $userService;

    /**
     * @param UserFactoryInterface $userFactory
     * @param UnitOfWorkInterface $uow
     */
    public function __construct(
        UserFactoryInterface $userFactory,
        UnitOfWorkInterface $uow
    ) {
        $this->userFactory = $userFactory;
        $this->uow = $uow;
        $this->userService = new UserService($uow->userRepository());
    }

    /**
     * @param string $userName
     * @param string $firstName
     * @param string $familyName
     * @return void
     */
    public function registerUser(
        string $userName,
        string $firstName,
        string $familyName
    ): void {
        try {
            $user = $this->userFactory->createUser(
                new UserName($userName),
                new FullName($firstName, $familyName)
            );

            if ($this->userService->duplicated($user)) {
                throw new \Exception('duplicated:(');
            }

            $this->uow->userRepository()->save($user);
            $this->uow->commit();
        } catch (\Throwable $th) {
            $this->uow->rollback();
            throw $th;
        }
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
    ): void {
        try {
            $targetId = new UserId($id);
            $target = $this->uow->userRepository()->findByUserId($targetId);

            if ($target === null) {
                throw new \Exception('not found. target id:' . $id);
            }

            $newUserName = new UserName($userName);
            $target->changeUserName($newUserName);
            $newName = new FullName($firstName, $familyName);
            $target->changeName($newName);
            $this->uow->userRepository()->save($target);
            $this->uow->commit();
        } catch (\Throwable $th) {
            $this->uow->rollback();
            throw $th;
        }
    }

    /**
     * @param string $id
     * @return void
     */
    public function deleteUser(string $id): void
    {
        try {
            $targetId = new UserId($id);
            $target = $this->uow->userRepository()->findByUserId($targetId);

            if ($target === null) {
                throw new Exception('not found. target id:' . $id);
            }

            $this->uow->userRepository()->delete($targetId);
            $this->uow->commit();
        } catch (\Throwable $th) {
            $this->uow->rollback();
            throw $th;
        }
    }

    /**
     * @param string $id
     * @return UserModel
     */
    public function getUserInfo(string $id): UserModel
    {
        $userId = new UserId($id);
        $target = $this->uow->userRepository()->findByUserId($userId);

        if ($target === null) {
            return null;
        }

        return new UserModel($target);
    }

    /**
     * @return array
     */
    public function getUserList(): array
    {
        $users = $this->uow->userRepository()->findAll();
        return array_map(function ($user) {
            return new UserSummaryModel($user);
        }, $users);
    }
}
