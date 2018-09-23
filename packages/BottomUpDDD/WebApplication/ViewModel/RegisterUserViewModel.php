<?php

namespace BottomUpDDD\WebApplication\ViewModel;

class RegisterUserViewModel
{
    /** @var string */
    public $userName;

    /** @var string */
    public $firstName;

    /** @var string */
    public $familyName;

    public function __construct(
        string $userName,
        string $firstName,
        string $familyName
    ) {
        $this->userName = $userName;
        $this->firstName = $firstName;
        $this->familyName = $familyName;
    }
}
