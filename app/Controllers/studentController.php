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
        $Courses=$this->student->getStudentCourses($_SESSION['id']);
        $this->render('student/studentCourses',['cours'=>$Courses]);
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
}
