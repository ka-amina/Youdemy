<?php

namespace App\Controllers;

use App\Models\ORM;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Cours;
use App\Controller;

class CoursController extends Controller
{
    protected $category;
    protected $tag;
    protected $cours;

    public function __construct()
    {
        $this->category = new Category();
        $this->tag = new Tag();
        $this->cours = new Cours();
    }

    public function showcategoriesAndTags()
    {
        $categories = $this->category->getCategories();
        $tags = $this->tag->getTags();
        // var_dump($tags);
        $this->render('courses/index', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function teacherCourses()
    {
        $cours = $this->cours->getCourses();
        $this->render('courses/teacherCourses', ['cours' => $cours]);
    }

    public function createCours()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'content' => $_POST['content'],
                'content_video' => $_POST['content_video'] ?? null,
                'content_document' => $_POST['content_document'] ?? null,
                'category' => $_POST['category'],
                'level' => $_POST['level']
            ];

            if (isset($_POST['content_document'])) {
                $this->cours->create($data);
            } else if (isset($_POST['content_video'])) {
                $this->cours->create($data, 'video');
            }
            $lastCourseId = $this->cours->getLastCourseId();
            var_dump($lastCourseId);
            if ($lastCourseId && isset($_POST['tags_id'])) {
                $this->cours->addTags($lastCourseId['id'], $_POST['tags_id']);
                header("Location: /courses");
                exit();
            }
        }
    }

    public function getCourseById()
    {
        $cours = $this->cours->getCourseById($_GET['id']);
        $getTags = $this->cours->getTagsById($_GET['id']);
        // var_dump($cours);
        $categories = $this->category->getCategories();
        $tags = $this->tag->getTags();
        $this->render('courses/editCourse', [
            'coursInfo' => $cours,
            'categories' => $categories,
            'tags' => $tags,
            'tags_name' => $getTags
        ]);
    }

    public function updateCourse()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump($_POST['id']);
            $data = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'content' => $_POST['content'],
                'content_video' => $_POST['content_video'] ?? null,
                'content_document' => $_POST['content_document'] ?? null,
                'category' => $_POST['category'],
                'level' => $_POST['level']
            ];
            $this->cours->updateCourse($data, ['id'=>$_POST['id']]);
            header("Location: /courses");
            exit();
        }
    }

    public function deleteCourse(){
        // echo"CLIKED";
        if (isset($_GET['id'])){
            $id=['id'=>$_GET['id']];
            $this->cours->deleteCourse($id);
            header("location: courses/teacherCourses");
            exit();

        }
    }
}
