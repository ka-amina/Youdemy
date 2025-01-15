<?php
namespace App\Models;

abstract class user implements Authenticable{
    protected $table = 'users';
    protected $orm;

    // protected $id;
    // protected $name;
    // protected $email;
    // protected $password;
    protected $role;

    public function __construct(){
        $this->orm= new ORM();
        $this->orm->setTable($this->table);
    }

    public function register($name, $email, $password) {
    }

    public function login($email, $password) {
        
    }

   

    
    
}

?>