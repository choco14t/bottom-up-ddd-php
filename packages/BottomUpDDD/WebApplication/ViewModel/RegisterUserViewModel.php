<?php

namespace BottomUpDDD\WebApplication\ViewModel;

class UserDetailViewModel
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
