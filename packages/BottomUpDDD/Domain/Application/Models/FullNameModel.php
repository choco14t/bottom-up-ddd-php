<?php

namespace BottomUpDDD\Domain\Application\Models;

use BottomUpDDD\Domain\Users\FullName;

final class FullNameModel
{
    /** @var string */
    private $firstName;

    /** @var string */
    private $familyName;

    public function __construct(FullName $source)
    {
        $this->firstName = $source->firstName();
        $this->familyName = $source->familyName();
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
}
