<?php

namespace App\Models;

class Admin extends user
{
    public function __construct()
    {
        parent::__construct();
        $this->role = "admin";
    }

    public function showUsers()
    {
        return $this->orm->read(['role' => 'user']);
    }

    public function AddUser($data)
    {
        return $this->orm->create($data);
    }
}
