<?php

namespace BottomUpDDD\Domain\Circles;

interface CircleNotificationInterface
{
    /**
     * @param CircleId $id
     * @return void
     */
    public function id(CircleId $id): void;

    /**
     * @param string $name
     * @return void
     */
    public function name(string $name): void;

    /**
     * @param BottomUpDDD\Domain\UserId[] $users
     * @return void
     */
    public function users(array $users): void;
}
