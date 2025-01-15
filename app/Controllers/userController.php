<?php

namespace App\Controllers;

use App\Models\AdminUser;
use App\Models\user;


class userController
{
    protected $user;

    public function __construct()
    {
        $this->user = new AdminUser();
    }

    public function showUsers()
    {
        return $this->user->showUsers();
    }
}