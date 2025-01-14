<?php

namespace App\Controllers;

use App\Models\Category;

class CategoryController
{
    protected $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function listCategories()
    {
        return $this->category->getCategories();
    }

    public function createCategory($data)
    {
        if (isset($_GET['action']) && $_GET['action'] == 'create') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'name' => $_POST['categoryName']
                ];
                $this->category->createCategory($data);
                header("Location: categories.php");
                exit();
            }
        }
    }
}
