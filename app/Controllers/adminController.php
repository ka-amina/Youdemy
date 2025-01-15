<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Admin;


class adminController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = new Admin();
    }

    public function showUsers()
    {
        $users = $this->user->showUsers();
        $this->render('user/index', ['user' => $users]);
    }

    public function createUser()
    {
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
            header("Location: /users");
            exit();
        }
    }

    public function getUserById()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $user = $this->user->getUser($id);
            $this->render('user/editUser', ['userInfo' => $user]);
        }
    }

    public function updateUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                // If a new image is uploaded
                $image = $_FILES['image']['name'];
                $temp_file = $_FILES['image']['tmp_name'];
                $folder = "../assets/articleimages/$image";
                move_uploaded_file($temp_file, $folder);
            } else {
                // Use the existing image
                $image = $_GET['old_image'];
            }
            if (isset($_POST['password'])) {
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            } else {
                $password = $_GET['old_password'];
            }
            $username = $_POST['username'];
            $email = $_POST['email'];
            // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $bio = $_POST['bio'];
            $role = $_POST['role'];
            $data = [
                'username' => $username,
                'email' => $email,
                'password_hash' => $password,
                'bio' => $bio,
                'role' => $role,
                'profile_picture_url' => $image,
            ];
            $this->user->updateUser($data, ['id' => $_GET['id']]);
            header("Location: /users");
            exit();
        }
    }

    public function deleteUser(){
        if (isset($_GET['id'])) {
            echo $_GET['id'];
            $id = ['id' => $_GET['id']];
            $this->user->deleteUdser($id);
            header("Location: /users");
            exit();
        }
    }
}
