<?php

namespace App\Controllers;

use App\Models\ORM;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Cours;
use App\Controller;



// class CoursController extends Controller
// {

//     // private string $table = 'courses';
//     // private $orm;
//     protected  $category;
//     protected  $tag;
//     protected  $cours;

//     public function __construct()
//     {
//         // $this->orm = new ORM();
//         // $this->orm->setTable($this->table);
//         $this->category = new Category();
//         $this->tag = new Tag();
//         $this->cours = new Cours();
//     }

//     public function showcategoriesAndTags() {
//         $categories= $this->category->getCategories();
//         // $tags= $this->tag->getTags();
//         $this->render('courses/index', [
//             'categories' => $categories,
//             // 'tags' => $tags
//         ]);
//     }

//     public function createByDocument($data)
//     {

//         $title = $_POST['title'];
//         $description = $_POST['description'];
//         $content = $_POST['content'];
//         $content_video = $_POST['content_video'];
//         $content_document = $_POST['content_document'];
//         $category = $_POST['category'];
//         $level= $_POST['level'];

//         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//             $data = [
//                 'title' => $title,
//                 'description' => $description,
//                 'content' => $content,
//                 'content_document' => $content_document,
//                 'level'=>$level,
//                 'category_id' => $category,
//                 'teacher_id'=>1,
//             ];
//             $is_created = $this->cours->createCours($data);


//         }
//     }
//     public function createByVideo($data,$type)
//     {

//         $title = $_POST['title'];
//         $description = $_POST['description'];
//         $content = $_POST['content'];
//         $content_video = $_POST['content_video'];
//         $content_document = $_POST['content_video'];
//         $category = $_POST['category'];
//         $level= $_POST['level'];

//         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//             $data = [
//                 'title' => $title,
//                 'description' => $description,
//                 'content' => $type,
//                 'content_video' => $content_video,
//                 'level'=>$level, 
//                 'category_id' => $category,
//                 'teacher_id'=>1,
//             ];
//             $is_created = $this->cours->createCours($data);


//         }
//     }

//     public function __call($name, $args) {
//         if ($name === "create") {
//             if (count($args) === 1) {
//                 return $this->createByDocument($args[0]);
//             } elseif (count($args) === 2) {
//                 return $this->createByVideo($args[0], $args[1]);
//             }
//         }
//     }
// }

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
}
