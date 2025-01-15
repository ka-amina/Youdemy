<?php

namespace App\Controllers;

use App\Models\Admin;


class adminController
{
    protected $user;

    public function __construct()
    {
        $this->user = new Admin();
    }

    public function showUsers()
    {
        return $this->user->showUsers();
    }
}