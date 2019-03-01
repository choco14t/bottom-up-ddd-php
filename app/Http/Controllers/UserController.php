<?php

namespace App\Http\Controllers;

use BottomUpDDD\Domain\UnitOfWorkSample\UserApplication;
use BottomUpDDD\WebApplication\ViewModel\UserSummaryViewModel;
use BottomUpDDD\Domain\Application\Models\UserSummaryModel;
use BottomUpDDD\WebApplication\ViewModel\UserDetailViewModel;
use BottomUpDDD\WebApplication\ViewModel\EditUserViewModel;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /** @var UserApplication */
    private $userApplication;

    /**
     * UserController constructor.
     * @param UserApplication $userApplication
     */
    public function __construct(UserApplication $userApplication)
    {
        $this->userApplication = $userApplication;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = $this->userApplication->getUserList();
        $summary = array_map(function (UserSummaryModel $user) {
            return new UserSummaryViewModel($user->id(), $user->userName());
        }, $users);
        return view('user.summary', ['summary' => $summary]);
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * @param UserRequest $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('user.new');
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
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

    /**
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(string $id)
    {
        $this->userApplication->deleteUser($id);
        return redirect('/');
    }
}
