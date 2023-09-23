<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CreateUserRequest;
use App\Http\Requests\admin\UpdateUserRequest;
use App\Models\User;
use App\Repositories\ProfileServiceRepositoryInterface;
use App\Repositories\UserServiceRepositoryInterface;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class ProfileController extends Controller
{
    use ApiResponser;

    private ProfileServiceRepositoryInterface $repo;

    const PROFILE_VIEW_PAGE_TITLE = "Profile";

    public function __construct(ProfileServiceRepositoryInterface $repo){
        $this->repo = $repo;
    }

    public function getProfile(Request $request){
        try {
            $data['users'] = $this->repo->getUserProfile();
            $data['title'] = self::PROFILE_VIEW_PAGE_TITLE;
            return view('admin.user.profile.index', $data);

        } catch (\Throwable $th) {
            return $th;
        }
    }
}
