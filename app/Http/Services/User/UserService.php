<?php

namespace App\Http\Services\User;

use App\Models\User;
use App\Repositories\UserServiceRepositoryInterface;
use Carbon\Carbon;

class UserService implements UserServiceRepositoryInterface {

    public function __construct(private User $user){}

    public function getUsersInfo()
    {
        return $this->user::getAllUsers()->toArray() ?? [];
    }

    public function getUserInfoById()
    {

    }

    public function storeUserInfo()
    {

    }

    public function updateUserInfoById(int $userId)
    {

    }

    public function deleteUserById(int $userId)
    {

    }

}
