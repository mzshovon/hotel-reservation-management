<?php

namespace App\Http\Services\Profile;

use App\Events\ActivityLogEvent;
use App\Http\Enums\ModuleEnum;
use App\Models\User;
use App\Repositories\ProfileServiceRepositoryInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class ProfileService implements ProfileServiceRepositoryInterface {

    public function __construct(private User $user){}

    public function getUserProfile()
    {
        $user = $this->user;
        $getLoggedInUser = $user::whereId(getUserInfo()->id)->first();
        return $getLoggedInUser;
    }

}
