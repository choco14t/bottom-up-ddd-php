<?php

namespace BottomUpDDD\Domain\Users;

use LogicException;
use BottomUpDDD\Common\Util;
use BottomUpDDD\Domain\EquatableInterface;

final class FullName implements EquatableInterface
{
    /** @var string */
    private $firstName;

    /** @var string */
    private $familyName;

    /**
     * @param string $firstName
     * @param string $familyName
     */
    public function __construct(string $firstName, string $familyName)
    {
        $this->firstName = $firstName;
        $this->familyName = $familyName;
    }

    /**
     * @return string
     */
    public function firstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function familyName(): string
    {
        return $this->familyName;
    }

    /**
     * @param FullName|EquatableInterface $obj
     * @return boolean
     */
    public function equals(EquatableInterface $obj): bool
    {
        if (Util::classEquals($this, $obj)) {
            return false;
        }

        return $this->firstName === $obj->firstName()
            && $this->familyName === $obj->familyName();
    }

    public function __set($name, $value)
    {
        throw new LogicException('Can not set properties.');
    }
}
