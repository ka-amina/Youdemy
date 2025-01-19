<?php

namespace App\Models;

class student extends user
{
    protected $orm;

    public function __construct()
    {
        parent::__construct();
        $this->role = "student";
    }

    public function enroleCourse(){
        
    }
    public function getStudentCourses($id){
        return $this->orm->getStudentCourses($id);
    }

    public function getCourseById($id)
    {
        return $this->orm->getCourseById($id);
    }

    public function getTagsById($id)
    {
        return $this->orm->getTagsNameById($id);
    }

    public function searchCourses($search)
    {
        return $this->orm->searchCourses($search);
    }
}
