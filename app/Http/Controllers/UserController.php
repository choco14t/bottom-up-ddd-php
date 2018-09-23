<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BottomUpDDD\Domain\Application\UserApplication;
use BottomUpDDD\WebApplication\ViewModel\UserSummaryViewModel;
use BottomUpDDD\Domain\Application\Models\UserSummaryModel;
use BottomUpDDD\WebApplication\ViewModel\UserDetailViewModel;
use BottomUpDDD\WebApplication\ViewModel\EditUserViewModel;
use App\Http\Requests\UserRequest;

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
        $users = $this->userApplication->getUserList();
        $summary = array_map(function (UserSummaryModel $user) {
            return new UserSummaryViewModel($user->id(), $user->userName());
        }, $users);
        return view('user.summary', ['summary' => $summary]);
    }

    public function show(string $id)
    {
        $user = $this->userApplication->getUserInfo($id);
        $model = new UserDetailViewModel(
            $user->id(),
            $user->userName(),
            $user->name()->firstName(),
            $user->name()->familyName()
        );
        return view('user.detail', ['user' => $model]);
    }

    public function edit(string $id)
    {
        $user = $this->userApplication->getUserInfo($id);
        $model = new EditUserViewModel(
            $user->id(),
            $user->userName(),
            $user->name()->firstName(),
            $user->name()->familyName()
        );
        return view('user.edit', ['user' => $model]);
    }

    public function update(UserRequest $request, string $id)
    {
        $input = $request->all();
        $this->userApplication->changeUserInfo(
            $id,
            $input['userName'],
            $input['firstName'],
            $input['familyName']
        );
        return redirect()->route('detail', ['id' => $id]);
    }

    public function create()
    {
        return view('user.new');
    }

    public function store(UserRequest $request)
    {
        $input = $request->all();
        $this->userApplication->registerUser(
            $input['userName'],
            $input['firstName'],
            $input['familyName']
        );
        return redirect('/');
    }

    public function delete(string $id)
    {
        $user = $this->userApplication->getUserInfo($id);
        $model = new UserDetailViewModel(
            $user->id(),
            $user->userName(),
            $user->name()->firstName(),
            $user->name()->familyName()
        );
        return view('user.delete', ['user' => $model]);
    }

    public function destroy(string $id)
    {
        $this->userApplication->deleteUser($id);
        return redirect('/');
    }
}
