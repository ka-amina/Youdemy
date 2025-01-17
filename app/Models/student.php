<?php
namespace App\Models;

class student extends user{
    public function __construct()
    {
        parent::__construct();
        $this->role = "student";
    }

    
    public function register($data){
        return $this->orm->create($data);
    }
}