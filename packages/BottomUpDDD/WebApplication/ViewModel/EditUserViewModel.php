<?php

namespace BottomUpDDD\WebApplication\ViewModel;

class EditUserViewModel
{
    /** @var string */
    public $id;

    /** @var string */
    public $userName;

    /** @var string */
    public $firstName;

    /** @var string */
    public $familyName;

    public function __construct(
        string $id,
        string $userName,
        string $firstName,
        string $familyName
    ) {
        $this->id = $id;
        $this->userName = $userName;
        $this->firstName = $firstName;
        $this->familyName = $familyName;
    }
}
