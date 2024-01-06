<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = ['super-admin','admin','moderator','user'];

        foreach ($roles as $role) {
            $savedRole = Role::create(['name' => $role]);
            if(in_array($role,['super-admin','admin'])){
                $routes = Permission::all();
                $data = [];
                foreach($routes as $route){
                    $data[$route->name] = $route->name;
                }
                $savedRole->syncPermissions($data);
            } else{
                $data = [
                    'admin.dashboard'=>'admin.dashboard','logout.perform'=>'logout.perform'
                ];
                $savedRole->syncPermissions($data);
            }
        }
    }
}
