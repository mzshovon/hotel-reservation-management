<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();

        return view('permission.permissions.index', [
            'permissions' => $permissions
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name'
        ]);

        if($request->permission_id){
            $permission = Permission::find($request->permission_id);
            $permission->name = $request->name;
            $permission->update();
        } else{
            Permission::create($request->only('name'));
        }

        return redirect()->route('permissions.index')->with('success','Permission created successfully.');
    }
}