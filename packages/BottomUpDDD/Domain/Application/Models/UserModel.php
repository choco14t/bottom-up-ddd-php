<?php

namespace BottomUpDDD\Domain\Application\Models;

use BottomUpDDD\Domain\Users\User;

final class UserModel
{
    /** @var string */
    private $id;

    /** @var string */
    private $userName;

    /** @var FullNameModel */
    private $name;

    public function __construct(User $source)
    {
        $this->id = $source->id()->value();
        $this->userName = $source->userName()->value();
        $this->name = new FullNameModel($source->fullName());
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function userName(): string
    {
        return $this->userName;
    }

    /**
     * @return FullNameModel
     */
    public function name(): FullNameModel
    {
        return $this->name;
    }
}
