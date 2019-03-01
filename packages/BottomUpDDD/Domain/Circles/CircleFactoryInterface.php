<?php

namespace BottomUpDDD\Domain\Circles;

use BottomUpDDD\Domain\Users\UserId;

interface CircleFactoryInterface
{
    /**
     * @param UserId $userId
     * @param string $name
     * @return Circle
     */
    public function create(UserId $userId, string $name): Circle;
}
