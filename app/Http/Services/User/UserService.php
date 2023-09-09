<?php

namespace App\Http\Services\User;

use App\Events\ActivityLogEvent;
use App\Http\Enums\ModuleEnum;
use App\Models\User;
use App\Repositories\UserServiceRepositoryInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceRepositoryInterface {

    public function __construct(private User $user){}

    public function getUsersInfo()
    {
        return $this->user::getAllUsers()->toArray() ?? [];
    }

    public function getUserInfoById()
    {

    }

    public function storeUserInfo($name, $email, $status)
    {
        try {
            $formatForStoreUser = [
                "name" => $name,
                "email" => $email,
                "password" => \bcrypt($email),
                "status" => $status,
            ];

            if ($this->user::create($formatForStoreUser)) {
                return ["success", "User Created Sucessfully!"];
            }

        } catch (QueryException | Exception $e) {
            return ["error", "Something Went Wrong. Error: ".$e->getMessage()];
        }
    }

    public function updateUserInfoById(int $userId, $name, $email, $status)
    {
        try {
            $formatForUpdateUser = [
                "name" => $name,
                "email" => $email,
                "status" => $status,
            ];
            if ($this->user::updateUserByParam("id", $userId, $formatForUpdateUser)) {
                event(new ActivityLogEvent(ModuleEnum::UserUpdate->value, json_encode($formatForUpdateUser), "User named $name info updated", "user-update"));
                return ["success", "User Updated Sucessfully!"];
            }

        } catch (QueryException | Exception $e) {
            return ["error", "Something Went Wrong. Error: ".$e->getMessage()];
        }
    }

    public function deleteUserById(int $userId)
    {

    }

}
