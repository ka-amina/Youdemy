<?php

namespace App\Models;

class student extends user
{
    private string $table = 'tags';
    private $orm;

    public function __construct()
    {
        parent::__construct();
        $this->role = "student";
    }

    public function enroleCourse(){
        
    }
}
