<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Admin;

class authentification extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->user = new Admin();
    }

    public function getLogin(){
        $this->render('login');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email =$_POST['email'];
            $password =$_POST['password'];
            $this->user->login($email, $password);
            header('Location: users');
        }
    }
}
