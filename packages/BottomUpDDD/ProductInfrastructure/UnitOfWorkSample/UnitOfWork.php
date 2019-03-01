<?php

namespace BottomUpDDD\ProductInfrastructure\UnitOfWorkSample;

use BottomUpDDD\Domain\UnitOfWorkSample\UnitOfWorkInterface;
use BottomUpDDD\Domain\Users\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class UnitOfWork implements UnitOfWorkInterface
{
    /** @var UserRepositoryInterface */
    private $userRepository;

    /**
     * UnitOfWork constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        DB::beginTransaction();
        $this->userRepository = $userRepository;
    }
    
    /**
     * @return UserRepositoryInterface
     */
    public function userRepository(): UserRepositoryInterface
    {
        return clone $this->userRepository;
    }

    public function commit(): void
    {
        DB::commit();
    }

    public function rollback(): void
    {
        DB::rollBack();
    }
}