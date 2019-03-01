<?php

namespace BottomUpDDD\Domain\Application;

use BottomUpDDD\Domain\Circles\CircleFactoryInterface;
use BottomUpDDD\Domain\Circles\CircleRepositoryInterface;
use BottomUpDDD\Domain\Users\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CircleApplication
{
    /** @var CircleFactoryInterface */
    private $circleFactory;

    /** @var CircleRepositoryInterface */
    private $circleRepository;

    /** @var UserRepositoryInterface */
    private $userRepository;

    public function __construct(
        CircleFactoryInterface $circleFactory,
        CircleRepositoryInterface $circleRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->circleFactory = $circleFactory;
        $this->circleRepository = $circleRepository;
        $this->userRepository = $userRepository;
    }

    public function createCircle(string $userId, string $circleName): void
    {
        DB::transaction();
    }

    public function joinUser(string $circleId, string $userId): void
    {
    }
}
