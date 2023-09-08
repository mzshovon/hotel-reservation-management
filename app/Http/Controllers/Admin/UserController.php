<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function createUser(Request $request){
        try {
            $data['users'] = $this->repo->storeUserInfo();
            return view('admin.user.index', $data);

        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function updateUser($userId){
        try {
            $data['users'] = $this->repo->updateUserInfoById($userId);
            return view('admin.user.index', $data);

        } catch (\Throwable $th) {
            return $th;
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
