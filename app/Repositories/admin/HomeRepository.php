<?php

namespace App\Repositories\admin;

class HomeRepository
{
    private $moduleName;
    private $data;

    public function __construct()
    {
        $this->moduleName = 'admin.';
    }

    public function layout($pageName)
    {
        echo view($this->moduleName.$pageName.'', $this->data);
    }

    public function dashboard()
    {
        $this->data = [
            'title'         => 'Admin Dashboard'
        ];
        $this->layout('dashboard');
    }
}
