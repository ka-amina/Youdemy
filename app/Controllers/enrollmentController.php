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
        
            $this->enroll->enroll($_SESSION['id'],$_GET['id']);
            header('location: home');
       
    }

    public function comleteCourse(){
        $this->enroll->completeCourse($_GET['id']);
        header('location: studentCourses');
    }

}

?>