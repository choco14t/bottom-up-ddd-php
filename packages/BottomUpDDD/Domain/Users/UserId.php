<?php

namespace BottomUpDDD\Domain\Users;

use BottomUpDDD\Common\Util;
use BottomUpDDD\Domain\EquatableInterface;

final class UserId implements EquatableInterface
{
    /** @var string */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    /**
     * @param UserId|EquatableInterface $obj
     * @return boolean
     */
    public function equals(EquatableInterface $obj): bool
    {
        if (Util::classEquals($this, $obj) === false) {
            return false;
        }

        return $this->value === $obj->value();
    }
}
