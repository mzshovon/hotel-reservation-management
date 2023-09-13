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
            'admin.activityLogs','admin.usersList','admin.createUser','admin.updateUser','admin.deleteUser',
            'admin.roomTypesList','admin.createRoomType','admin.editRoomType','admin.storeRoomType','admin.deleteRoomType'
        ];

        foreach ($routes as $route) {
            $permission = new Permission();
            $permission->name = $route;
            $permission->guard_name = "web";
            $permission->save();
        }
    }
}
