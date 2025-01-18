<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Admin;
use App\Controllers\TagController;
use App\Controllers\CategoryController;
use App\Controllers\CoursController;

class adminController extends Controller
{
    protected $user;
    protected $tag;
    protected $category;
    protected $courses;

    public function __construct()
    {
        $this->user = new Admin();
        $this->tag = new TagController();
        $this->category = new CategoryController();
        $this->courses = new CoursController();
    }

    public function showUsers()
    {

        $users = $this->user->showUsers();
        $allusers = $this->user->showAllUsers();
        $this->render('user/index', [
            'user' => $users,
            'allUsers' => $allusers
        ]);
    }


    public function createUser()
    {
        $image = $_FILES['image']['name'];
        $temp_file = $_FILES['image']['tmp_name'];
        echo $temp_file;
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
                $folder = "../../assets/images/$image";
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

    public function deleteUser()
    {
        if (isset($_GET['id'])) {
            // echo $_GET['id'];
            $id = ['id' => $_GET['id']];
            $this->user->deleteUdser($id);
            header("Location: /users");
            exit();
        }
    }

    public function acceptTeacher()
    {
        if (isset($_GET['id'])) {
            $id = ['id' => $_GET['id']];
            $this->user->acceptTeacher(['role' => 'teacher'], $id);
            header("Location: /users");
            exit();
        }
    }

    public function banUser(){
        if (isset($_GET['id'])) {
            $id = ['id' => $_GET['id']];
            $this->user->banUser(['is_banned'=>true], $id);
            header("Location: /users");
            exit();
        }
    }

    public function getStatistique()
    {

        $sumUsers = $this->user->countUsers();
        $tags= $this->tag->countTags();
        $categories= $this->category->countCategories();
        $cours= $this->courses->countCourses();
        $topUsers= $this->user->getTopUsers();
        $this->render('/dashboard', [
            'usersCount' => $sumUsers,
            'tagCount' => $tags,
            'categoryCount' => $categories,
            'coursesCount' => $cours,
            'user'=>$topUsers
        ]);
    }
    
}
