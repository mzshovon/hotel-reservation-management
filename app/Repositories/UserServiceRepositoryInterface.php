<?php

namespace App\Repositories;

interface UserServiceRepositoryInterface
{

    public function getUsersInfo();
    public function getUserInfoById();
    public function storeUserInfo();
    public function updateUserInfoById(int $userId);
    public function deleteUserById(int $userId);

}
