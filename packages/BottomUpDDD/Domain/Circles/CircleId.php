<?php

namespace BottomUpDDD\Domain\Circles;

use BottomUpDDD\Domain\EquatableInterface;

class CircleId implements EquatableInterface
{
    /** @var string */
    private $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }

    /**
     * @param CircleId|EquatableInterface $obj
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
