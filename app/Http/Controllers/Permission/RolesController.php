<?php

namespace App\Http\Controllers\Permission;

use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->paginate(100);
        return view('admin.permission.roles.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 100);
    }

    public function create()
    {
        $permissions = Permission::get();
        return view('admin.permission.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->get('name')]);
        $role->syncPermissions($request->get('permission'));

        return redirect()->route('admin.rolesList')
                        ->with('success','Role created successfully');
    }

    // public function show(Role $role)
    // {
    //     $role = $role;
    //     $rolePermissions = $role->permissions;

    //     return view('permission.roles.show', compact('role', 'rolePermissions'));
    // }

    public function edit($id)
    {
        $role = Role::find($id);
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        $permissions = Permission::get();
        return view('admin.permission.roles.edit', compact('role', 'rolePermissions', 'permissions'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->update($request->only('name'));
        $role->syncPermissions($request->get('permission'));
        return redirect()->route('admin.rolesList')
                        ->with('success','Role updated successfully');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('admin.rolesList')
                        ->with('success','Role deleted successfully');
    }
}
