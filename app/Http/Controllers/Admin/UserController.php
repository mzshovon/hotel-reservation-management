<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CreateUserRequest;
use App\Http\Requests\admin\UpdateUserRequest;
use App\Repositories\UserServiceRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserServiceRepositoryInterface $repo;

    const USER_VIEW_PAGE_TITLE = "List Of Users";

    public function __construct(UserServiceRepositoryInterface $repo){
        $this->repo = $repo;
    }

    public function getUsers(Request $request){
        try {
            $data['users'] = $this->repo->getUsersInfo();
            $data['title'] = self::USER_VIEW_PAGE_TITLE;
            return view('admin.user.index', $data);

        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function createUser(CreateUserRequest $request){
        try {
            $name = $request->name ?? null;
            $email = $request->email ?? null;
            $status = $request->status ?? null;
            [$statusName, $message] = $this->repo->storeUserInfo($name, $email, $status);
            return redirect()->route('admin.usersList')->with($statusName, $message);

        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function updateUser(UpdateUserRequest $request, $userId){
        try {
            $name = $request->name ?? null;
            $email = $request->email ?? null;
            $status = $request->status ?? null;
            [$statusName, $message] = $this->repo->updateUserInfoById($userId, $name, $email, $status);
            return redirect()->route('admin.usersList')->with($statusName, $message);

        } catch (\Throwable $th) {
            return back()->with(500, $th->getMessage());
        }
    }

    public function deleteUser($userId){
        try {
            $data['users'] = $this->repo->deleteUserById($userId);
            return view('admin.user.index', $data);

        } catch (\Throwable $th) {
            return $th;
        }
    }
}