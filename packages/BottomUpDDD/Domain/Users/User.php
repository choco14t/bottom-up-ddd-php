<?php

namespace BottomUpDDD\Domain\Users;

use InvalidArgumentException;
use BottomUpDDD\Common\Util;
use BottomUpDDD\Domain\EquatableInterface;

final class User implements EquatableInterface
{
    /** @var UserId */
    private $id;

    /** @var UserName */
    private $userName;

    /** @var FullName */
    private $fullName;

    public function __construct(
        UserName $userName,
        FullName $fullName,
        UserId $id = null
    ) {
        $this->id = $id === null ? new UserId(Util::guid()) : $id;
        $this->userName = $userName;
        $this->fullName = $fullName;
    }

    /**
     * @return UserId
     */
    public function id(): UserId
    {
        return $this->id;
    }

    /**
     * @return UserName
     */
    public function userName(): UserName
    {
        return $this->userName;
    }

    /**
     * @return FullName
     */
    public function fullName(): FullName
    {
        return $this->fullName;
    }

    /**
     * @param UserName $newName
     * @return void
     */
    public function changeUserName(UserName $newName): void
    {
        if ($newName === null) {
            throw new InvalidArgumentException('UserName is required.');
        }

        $this->userName = $newName;
    }

    /**
     * @param FullName $newName
     * @return void
     */
    public function changeName(FullName $newName): void
    {
        if ($newName === null) {
            throw new InvalidArgumentException('Can not change to null.');
        }

        $this->fullName = $newName;
    }

    /**
     * @param User|EquatableInterface $obj
     * @return boolean
     */
    public function equals(EquatableInterface $obj): bool
    {
        if ($obj === null || Util::classEquals($this, $obj) === false) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        return $this->id->equals($obj->id());
    }
}
