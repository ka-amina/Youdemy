<?php

namespace App\Models;

use App\Models\ORM;

class Cours
{
    private string $table = 'courses';
    private $orm;

    public function __construct()
    {
        $this->orm = new ORM();
        $this->orm->setTable($this->table);
    }

    public function createByDocument($data)
    {
        $courseData = [
            'title' => $data['title'],
            'description' => $data['description'],
            'content' => $data['content'],
            'content_document' => $data['content_document'],
            'level' => $data['level'],
            'category_id' => $data['category'],
            'teacher_id' => 1,
        ];


        $result = $this->orm->create($courseData);
        return $result;
    }

    public function createByVideo($data, $type)
    {
        $courseData = [
            'title' => $data['title'],
            'description' => $data['description'],
            'content' => $type,
            'content_video' => $data['content_video'],
            'level' => $data['level'],
            'category_id' => $data['category'],
            'teacher_id' => $data['teacher']
        ];

        $result = $this->orm->create($courseData);
        return $result;
    }

    public function __call($name, $args)
    {
        if ($name === "create") {
            if (count($args) === 1) {
                return $this->createByDocument($args[0]);
            } elseif (count($args) === 2) {
                return $this->createByVideo($args[0], $args[1]);
            }
        }
    }


    public function addTags($courseId, $tagIds)
    {
        if (empty($tagIds)) {
            return false;
        }

        foreach ($tagIds as $tagId) {
            $tags = [
                'course_id' => $courseId,
                'tag_id' => $tagId
            ];
            $this->orm->createcourseTags($tags);
        }
        return true;
    }

    public function getLastCourseId()
    {
        return $this->orm->getLastCourseId();
    }

    public function getCourses($id)
    {
        return $this->orm->getCourses($id);
    }

    public function getCourseById($id)
    {
        return $this->orm->getCourseById($id);
    }
    public function getTagsById($id)
    {
        return $this->orm->getTagsNameById($id);
    }
    public function updateCourse($data, $conditions)
    {
        return $this->orm->update($data, $conditions);
    }
    public function deleteCourse($id)
    {
        return $this->orm->delete($id);
    }

    public function countCourses(){
        return $this->orm->sum();
    }

    public function coursesPagination($resultsPerPage,$offset){
        return $this->orm->coursesPagination($resultsPerPage,$offset);

    }

    public function showCoursesRequest(){
        return $this->orm->showCoursesRequest();
    }

    public function acceptCourse($course, $student){
        return $this->orm->acceptCourse($course, $student);
    }

    public function deleteCourseTags($courseId){
        $this->orm->deleteCourseTags($courseId);
    }

    
}

