<?php

namespace BottomUpDDD\Domain\Application\Models;

use BottomUpDDD\Domain\Users\User;

final class UserSummaryModel
{
    /** @var string */
    private $id;

    /** @var string */
    private $userName;

    public function __construct(User $source)
    {
        $this->id = $source->id()->value();
        $this->userName = $source->userName()->value();
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
}
