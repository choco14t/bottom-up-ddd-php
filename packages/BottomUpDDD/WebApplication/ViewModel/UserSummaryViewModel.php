<?php

namespace BottomUpDDD\WebApplication\ViewModel;

class UserSummaryViewModel
{
    /** @var string */
    public $id;

    /** @var string */
    public $userName;

    public function __construct(string $id, string $userName)
    {
        $this->id = $id;
        $this->userName = $userName;
    }
}
