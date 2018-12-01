<?php

namespace BottomUpDDD\Domain\Circles;

use Exception;
use BottomUpDDD\Domain\EquatableInterface;
use BottomUpDDD\Domain\Users\User;

class Circle implements EquatableInterface
{
    /** @var CircleId */
    private $id;

    /** @var string */
    private $name;

    /** @var UserId[] */
    private $users;

    /** @var int */
    private const CAPACITY = 30;

    /**
     * @param CircleId $id
     * @param string $name
     * @param array $users
     */
    public function __construct(
        CircleId $id,
        string $name,
        array $users
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->users = $users;
    }

    /**
     * @param User $user
     * @return void
     */
    public function join(User $user): void
    {
        if (count($this->users) >= self::CAPACITY) {
            throw new Exception('too many members.');
        }

        $this->users[] = $user->id();
    }

    public function notify(): void
    {
        // code
    }
}
