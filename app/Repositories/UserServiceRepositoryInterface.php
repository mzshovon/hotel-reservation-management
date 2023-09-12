<?php

namespace App\Repositories;

interface UserServiceRepositoryInterface
{

    public function getUsersInfo();
    public function getUserInfoById();
    public function storeUserInfo($name, $email, $status);
    public function updateUserInfoById(int $userId, $name, $email, $status);
    public function deleteUserById(int $userId);

}
