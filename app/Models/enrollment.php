<?php

namespace App\Models;

use App\Models\ORM;

class enrollment
{
    protected $coursId;
    protected $studentId;
    protected $is_completed;
    private $orm;

    public function __construct()
    {
        $this->orm = new ORM();
    }

    public function enroll($student_id, $course_id)
    {
        $this->orm->enroll($student_id, $course_id);
    }
}
