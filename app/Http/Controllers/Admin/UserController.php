<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CreateUserRequest;
use App\Http\Requests\admin\UpdateUserRequest;
use App\Models\User;
use App\Repositories\UserServiceRepositoryInterface;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use ApiResponser;

    private UserServiceRepositoryInterface $repo;

    const USER_VIEW_PAGE_TITLE = "List Of Users";

    public function __construct(UserServiceRepositoryInterface $repo){
        $this->repo = $repo;
    }

    public function getUsers(Request $request){
        try {
            $data['users'] = $this->repo->getUsersInfo();
            $data['title'] = self::USER_VIEW_PAGE_TITLE;
            $data['roles'] = Role::all();
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
            $data = [];
            [$data['statusName'], $data['message']] = $this->repo->deleteUserById($userId);
            return $this->success($data);

        } catch (\Exception $e) {
            return $this->error("Something went wrong with error ".$e, null, $e->getCode());
        }
    }

    public function assignRoleToUser(Request $request) {
        if(DB::table('model_has_roles')->where('model_id',$request->user_id)->first()) {
            DB::table('model_has_roles')->where('model_id',$request->user_id)->update(['role_id'=>$request->role_id]);
        } else {
            $user = User::find($request->user_id);
            $user->assignRole([$request->role_id]);
        }
        return back()->with('success', 'Role assigned successfully.');
    }
}
