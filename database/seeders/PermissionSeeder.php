<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $routes = [
            'logout.perform','admin.dashboard','admin.assignRoleToUser','admin.permissionsList','admin.storePermissions',
            'admin.rolesList','admin.createRoles','admin.storeRoles','admin.editRoles','admin.updateRoles',
            'users.index','users.create','users.store','users.edit',
            'status.index','status.store','tasks.index','tasks.create','tasks.store','tasks.edit','tasks.destroy',
        ];

        foreach ($routes as $route) {
            $permission = new Permission();
            $permission->name = $route;
            $permission->guard_name = "web";
            $permission->save();
        }
    }
}
