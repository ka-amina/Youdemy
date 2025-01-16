<?php

namespace App\Models;

use App\Models\ORM;
use App\Models\Category;
use App\Models\Tag;


// class Cours
// {

//     private string $table = 'courses';
//     private $orm;

//     public function __construct()
//     {
//         $this->orm = new ORM();
//         $this->orm->setTable($this->table);
    
//     }

//     public function createCours($data){
//         $this->orm->create($data);
//     }

// }

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
        
        return $this->orm->create($courseData);
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
            'teacher_id' => 1,
        ];

        return $this->orm->create($courseData);
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
}