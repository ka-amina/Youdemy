<?php
namespace App\Models;

class teacher extends user{
    public function __construct(){
        parent::__construct();
        $this->role="teacher";
    }

}


?>