<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Admin;
use App\Models\student;

class authentification extends Controller
{
    protected $user;
    protected $student;
    public function __construct()
    {
        $this->user = new Admin();
        $this->student = new student();
    }

    public function getLogin(){
        $this->render('login');
    }
    public function getregister(){
        $this->render('register');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email =$_POST['email'];
            $password =$_POST['password'];
            $this->user->login($email, $password);
            header('Location: users');
            exit();
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $Hashedpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $data = [
                'username' => $_POST['name'],
                'email' => $_POST['email'],
                'password_hash' => $Hashedpassword,
                'role' => 'student'
            ];
            $this->student->register($data);
            header("Location: courses");
            exit();
        }
    }
}
