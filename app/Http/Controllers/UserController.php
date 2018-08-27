<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BottomUpDDD\Domain\Application\UserApplication;

class UserController extends Controller
{
    /** @var UserApplication */
    private $userApplication;

    public function __construct(UserApplication $userApplication)
    {
        $this->userApplication = $userApplication;
    }

    public function index()
    {
        return view('welcome');
    }
}
