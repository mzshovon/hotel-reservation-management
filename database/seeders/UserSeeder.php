<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            0 => [
                'name' => 'Super admin',
                'email' => 'admin.super@gmail.com',
                'username' => 'admin.super@gmail.com',
                'password' => Hash::make('password'), // it will automatically bcrypted as we set it in User model
            ],
            1 => [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'username' => 'admin@gmail.com',
                'password' => Hash::make('password'), // it will automatically bcrypted as we set it in User model
            ],
            2 => [
                'name' => 'moderator',
                'email' => 'moderator@gmail.com',
                'username' => 'moderator@gmail.com',
                'password' => Hash::make('password'), // it will automatically bcrypted as we set it in User model
            ],
            3 => [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'username' => 'user@gmail.com',
                'password' => Hash::make('password'), // it will automatically bcrypted as we set it in User model
            ],
        ];

        foreach ($users as $key => $user) {
            $savedUser = User::create($user);
            $savedUser->assignRole([++$key]);
        }
    }
}
