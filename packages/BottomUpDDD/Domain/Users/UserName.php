<?php

namespace BottomUpDDD\Domain\Users;

use InvalidArgumentException;
use BottomUpDDD\Common\Util;
use BottomUpDDD\Domain\EquatableInterface;

final class UserName implements EquatableInterface
{
    /** @var string */
    private $name;

    public function __construct(string $name)
    {
        if (Util::isNullOrEmpty($name)) {
            throw new InvalidArgumentException('UserName is required.');
        }

        if (strlen($name) > 50) {
            throw new InvalidArgumentException('It must be 50 characters or less.');
        }

        $this->name = $name;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->name;
    }

    /**
     * @param UserName|EquatableInterface $obj
     * @return boolean
     */
    public function equals(EquatableInterface $obj): bool
    {
        if (Util::classEquals($this, $obj) === false) {
            return false;
        }

        return $this->name === $obj->value();
    }
}
