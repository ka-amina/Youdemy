<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function listCategories()
    {
        if ($_SESSION['role'] == 'admin') {
            $categories = $this->category->getCategories();
            // var_dump($categories);
            $this->render('category/index', ['categories' => $categories]);
        } else {
            header('location: home');
        }
    }

    public function createCategory()
    {
        if ($_SESSION['role'] == 'admin') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'name' => $_POST['categoryName']
                ];
                $this->category->createCategory($data);
                header('Location: /category');
                exit();
            }
        } else {
            header('location: home');
        }
    }

    public function getCategoryById()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $categoryInfo =  $this->category->getCategryById($id);
            $this->render('category/editCategory', ['categoryInfo' => $categoryInfo]);
        }
    }

    public function updateCategory()
    {
        if ($_SESSION['role'] == 'admin') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->category->updateCategory(['name' => $_POST['categoryName']], ['id' => $_GET['id']]);
                header('Location: /category');
                exit();
            }
        } else {
            header('location: home');
        }
    }

    public function deleteCategory()
    {
        if ($_SESSION['role'] == 'admin') {
            if (isset($_GET['id'])) {
                // echo $_GET['id'];
                $id = ['id' => $_GET['id']];
                $this->category->deleteCategory($id);
                header('Location: /category');
                exit();
            }
        } else {
            header('location: home');
        }
    }

    public function countCategories()
    {
        return $this->category->countCategories();
    }
}
