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


    public function teacherCourses()
    {
        if ($_SESSION['role'] == 'teacher') {
            $categories = $this->category->getCategories();
            $tags = $this->tag->getTags();
            $cours = $this->cours->getCourses($_SESSION['id']);
            $pending = $this->cours->countPending($_SESSION['id']);
            $accepted = $this->cours->countaccepted($_SESSION['id']);

            $this->render('courses/teacherCourses', [
                'cours' => $cours,
                'categories' => $categories,
                'tags' => $tags,
                'pending' => $pending,
                'accepted' => $accepted,
            ]);
        } else {
            header('location: home');
        }
    }




    public function createCours()
    {
        if ($_SESSION['role'] == 'teacher') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $data = [
                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'content' => $_POST['content'],
                    'content_document' => $_POST['content_document'],
                    'content_video' => $_POST['content_video'],
                    'category' => $_POST['category'],
                    'level' => $_POST['level'],
                    'teacher' => $_SESSION['id']
                ];
                // var_dump($data);
                // var_dump($_SESSION['id']);


                if ($_POST['content'] === 'document') {
                    $this->cours->create($data);
                } else if ($_POST['content'] === 'video') {
                    $this->cours->create($data, 'video');
                }
                $lastCourseId = $this->cours->getLastCourseId();
                var_dump($lastCourseId);
                if ($lastCourseId && isset($_POST['tags_id'])) {
                    $this->cours->addTags($lastCourseId['id'], $_POST['tags_id']);
                    header("Location: /teacherCourses");
                    exit();
                }
            }
        } else {
            header('location: home');
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
        if ($_SESSION['role'] == 'teacher') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // var_dump($_POST['id']);
                $data = [
                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'content' => $_POST['content'],
                    'content_video' => $_POST['content_video'],
                    'content_document' => $_POST['content_document'],
                    'category_id' => $_POST['category'],
                    'level' => $_POST['level'],
                    'status' => 'pending'
                ];
                $this->cours->updateCourse($data, ['id' => $_POST['id']]);
                $this->cours->deleteCourseTags($_POST['id']);
                if (isset($_POST['tags_id'])) {
                    $this->cours->addTags($_POST['id'], $_POST['tags_id']);
                    header("Location: teacherCourses");
                    exit();
                }
            }
        } else {
            header('location: home');
        }
    }

    public function deleteCourse()
    {
        if ($_SESSION['role'] == 'teacher') {
            if (isset($_GET['id'])) {
                $id = ['id' => $_GET['id']];
                $this->cours->deleteCourse($id);
                header("location: teacherCourses");
                exit();
            }
        } else {
            header('location: home');
        }
    }

    public function countCourses()
    {
        return $this->cours->countCourses();
    }

    public function visitorCourses()
    {
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $resultsPerPage = 8;
        $offset = ($currentPage - 1) * $resultsPerPage;
        $courses = $this->cours->coursesPagination($resultsPerPage, $offset);
        $totalCourses = $this->cours->countCourses();
        $totalPages = ceil($totalCourses / $resultsPerPage);
        $this->render(
            'courses',
            [
                'cours' => $courses,
                'totalPages' => $totalPages,
                'currentPage' => $currentPage
            ]
        );
    }

    public function showCoursesRequest()
    {
        if ($_SESSION['role'] == 'teacher') {
            $result = $this->cours->showCoursesRequest();
            $this->render(
                'courses/coursesRequest',
                ['request' => $result]
            );
        } else {
            header('location: home');
        }
    }

    public function acceptCourse()
    {
        if ($_SESSION['role'] == 'teacher') {
            $this->cours->acceptCourse($_GET['course'], $_GET['student']);
            header('location: requests');
        } else {
            header('location: home');
        }
    }

    public function getPendingCourses()
    {
        $request = $this->cours->getPendingCourses();

        // print_r($request);
        $this->render('courses/teacherCoursesRequest', [
            'request' => $request
        ]);
    }

    public function accept()
    {
        if ($_SESSION['role'] == 'admin') {
            $this->cours->acceptTeacherCourse($_GET['id']);
            header('location: coursesRequests');
        } else {
            header('location: home');
        }
    }
    public function refuse()
    {
        if ($_SESSION['role'] == 'admin') {
            $this->cours->rejectCourse($_GET['id']);
            header('location: coursesRequests');
        } else {
            header('location: home');
        }
    }
}
