<?php

namespace BottomUpDDD\WebApplication\ViewModel;

class UserViewModel
{
    /** @var string */
    public $id;

    /** @var string */
    public $firstName;

    /** @var string */
    public $familyName;

    public function __construct(
        string $id,
        string $firstName,
        string $familyName
    ) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->familyName = $familyName;
    }
}
