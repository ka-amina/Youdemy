<?php

namespace App\Controllers;

use App\Controller;
use App\Models\student;

class  studentController extends Controller
{
    protected $student;

    public function __construct()
    {
        $this->student = new student();
       
    }

    public function getStudentCourses(){
        if ($_SESSION['role'] == 'student') {
        $Courses=$this->student->getStudentCourses($_SESSION['id']);
        $completed=$this->student->completedCourses($_SESSION['id']);
        $this->render('student/studentCourses',['cours'=>$Courses,'completedCourses'=>$completed]);
    } else {
        header('location: home');
    }
    }

    public function getCourseById()
    {
        $getTags = $this->student->getTagsById($_GET['id']);
        $cours = $this->student->getCourseById($_GET['id']);
        $this->render('student/coursePage', [
            'coursInfo' => $cours,
            'tags'=>$getTags
        ]);
    }

    public function searchCourses()
    {
        $result = $this->student->searchCourses($_GET['search']);
        $this->render('student/search', [
            'search' => $result,
        ]);
    }
}
