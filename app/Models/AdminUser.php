<?php
namespace App\Models;

class AdminUser extends user
{
    public function __construct() {
        parent::__construct();
        $this->role = "admin";
    }
    
    public function showUsers(){
        return $this->orm->read();
    }

}
?>