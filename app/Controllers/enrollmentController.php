<?php
namespace App\Controllers;

use App\Controller;
use App\Models\enrollment;

class enrollmentController extends Controller{

    protected $enroll;

    public function __construct()
    {
        $this->enroll = new enrollment();
       
    }

    public function enroll(){
        if ($_SESSION['role'] == 'student') {
            $this->enroll->enroll($_SESSION['id'],$_GET['id']);
            header('location: home');
        } else {
            header('location: home');
        }
       
    }

    public function comleteCourse(){
        if ($_SESSION['role'] == 'student') {
        $this->enroll->completeCourse($_GET['id']);
        header('location: studentCourses');
    } else {
        header('location: home');
    }
    }

}

?>