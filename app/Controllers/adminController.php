<?php

namespace App\Controllers;

use App\Models\Admin;


class adminController
{
    protected $user;

    public function __construct()
    {
        $this->user = new Admin();
    }

    public function showUsers()
    {
        return $this->user->showUsers();
    }

    public function createUser()
    {
        if (isset($_GET['action']) && $_GET['action'] == 'create') {
            $image = $_FILES['image']['name'];
            $temp_file = $_FILES['image']['tmp_name'];
            $folder = "../../assets/images/$image";
            move_uploaded_file($temp_file, $folder);

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $bio = $_POST['bio'];
            $role = 'user';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'username' => $username,
                    'email' => $email,
                    'password_hash' => $password,
                    'bio' => $bio,
                    'profile_picture_url' => $image,
                    'role' => $role,
                ];
                $this->user->AddUser($data);
                header("Location: users.php");
                exit();
            }
        }
    }
}
