<?php

namespace BottomUpDDD\Domain\UnitOfWorkSample;

use BottomUpDDD\Domain\Users\UserRepositoryInterface;

interface UnitOfWorkInterface
{
    /**
     * @return UserRepositoryInterface
     */
    public function userRepository(): UserRepositoryInterface;

    public function commit(): void;

    public function rollback(): void;
}
