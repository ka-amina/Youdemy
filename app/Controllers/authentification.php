<?php
namespace App\Controllers;
use App\Controller;
use App\Models\Admin;

class authentification extends Controller
{
    protected $user;
    protected $errors = [];

    public function __construct()
    {
        $this->user = new admin();
    }

    private function validateLogin($email, $password)
    {
        $this->errors = [];

        if (empty($email)) {
            $this->errors['email'] = 'Email is required';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Invalid email format';
        }
        
        if (empty($password)) {
            $this->errors['password'] = 'Password is required';
        }

        return empty($this->errors);
    }

    private function validateRegister($data)
    {
        $this->errors = [];

        // Name validation
        if (empty($data['name'])) {
            $this->errors['name'] = 'Name is required';
        } elseif (strlen($data['name']) < 2) {
            $this->errors['name'] = 'Name must be at least 2 characters long';
        }

        // Email validation
        if (empty($data['email'])) {
            $this->errors['email'] = 'Email is required';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Invalid email format';
        }

        // Password validation
        if (empty($data['password'])) {
            $this->errors['password'] = 'Password is required';
        } elseif (strlen($data['password']) < 8) {
            $this->errors['password'] = 'Password must be at least 8 characters long';
        }

        // Role validation
        if (empty($data['role'])) {
            $this->errors['role'] = 'Role is required';
        } elseif (!in_array($data['role'], ['student', 'user'])) {
            $this->errors['role'] = 'Invalid role selected';
        }

        return empty($this->errors);
    }

    public function getLogin()
    {
        $this->render('login', ['errors' => $this->errors]);
    }

    public function getregister()
    {
        $this->render('register', ['errors' => $this->errors]);
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('location: home');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if ($this->validateLogin($email, $password)) {
                $result = $this->user->login($email, $password);

                if ($result) {
                    $_SESSION["role"] = $result["role"];
                    $_SESSION["id"] = $result["id"];
                    $_SESSION["username"] = $result["username"];
                    $_SESSION["email"] = $result["email"];
                    $_SESSION["image"] = $result["profile_picture_url"];
                    $_SESSION["ban"] = $result["is_banned"];

                    switch ($_SESSION['role']) {
                        case 'admin':
                            header('Location: /dashboard');
                            break;
                        case 'teacher':
                            header('Location: /teacherCourses');
                            break;
                        case 'student':
                        case 'user':
                            header('Location: /home');
                            break;
                    }
                    exit();
                } else {
                    $this->errors['login'] = 'Invalid email or password';
                    $this->render('login', ['errors' => $this->errors]);
                }
            } else {
                $this->render('login', ['errors' => $this->errors]);
            }
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->validateRegister($_POST)) {
                $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $data = [
                    'username' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password_hash' => $hashedPassword,
                    'role' => $_POST['role']
                ];

                $result = $this->user->register($data);
                if ($result) {
                    header("Location: login");
                    exit();
                } else {
                    $this->errors['register'] = 'Registration failed. Please try again.';
                    $this->render('register', ['errors' => $this->errors]);
                }
            } else {
                $this->render('register', ['errors' => $this->errors]);
            }
        }
    }
}