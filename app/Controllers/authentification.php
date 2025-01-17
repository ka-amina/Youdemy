<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Admin;

class authentification extends Controller
{
    protected $user;
    protected $student;
    public function __construct()
    {
        $this->user = new admin();
    }

    public function getLogin()
    {
        $this->render('login');
    }
    public function getregister()
    {
        $this->render('register');
    }
    public function logout(){
        header('location:/');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = $this->user->login($email, $password);
            if ($result) {
                header('Location: users');
                exit();
            } else {
                header('Location: login');
            }
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
                'role' => $_POST['role']
            ];
            $result = $this->user->register($data);
            if (!$result) {
                header("Location: login");
                exit();
            }else{
                header("Location: register");
                exit();
            }
        }
    }
}
