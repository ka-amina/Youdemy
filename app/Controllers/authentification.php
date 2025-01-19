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
        session_unset();
        session_destroy();
        header('location: home');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            // var_dump($email);
            // var_dump($password);
            $result = $this->user->login($email, $password);
            
            if ($result == true) {
                $_SESSION["role"] = $result["role"];
                $_SESSION["id"] = $result["id"];
                $_SESSION["username"] = $result["username"];
                $_SESSION["email"] = $result["email"];
                if ($_SESSION['role'] == 'admin') {
                    header('Location: /dashboard');
                    exit();
                } elseif ($_SESSION['role'] == 'teacher' ) {
                    header('Location: /teacherCourses');
                    exit();
                }elseif ($_SESSION['role'] == 'student'  || $_SESSION['role'] == 'user'){
                    header('Location: /home');
                    exit();
                }
                
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
            // var_dump($data);
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
