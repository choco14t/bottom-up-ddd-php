<?php

namespace BottomUpDDD\Domain\Users;

final class UserService
{
    /** @var UserRepositoryInterface */
    private $userRepository;

    /**
     * @param UserRepositoryInterface $userRepositroy
     */
    public function __construct(UserRepositoryInterface $userRepositroy)
    {
        $this->userRepository = $userRepositroy;
    }

    /**
     * @param User $user
     * @return boolean
     */
    public function duplicated(User $user): bool
    {
        $existing = $this->userRepository->findByUserName($user->userName());

        return $existing !== null;
    }
}
