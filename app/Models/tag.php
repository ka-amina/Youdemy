<?php

namespace App\Models;

use App\Models\ORM;

class Tag
{
    private $table = 'tags';
    private $orm;

    public function __construct()
    {
        $this->orm = new ORM();
        $this->orm->setTable($this->table);
    }


    public function  getTags()
    {
        return $this->orm->read();
    }

    public function createTag($data){
        return $this->orm->create($data);
    }

    public function getTagById($id){
        return $this->orm->getById($id);
    }

    public function updateTag($data,$conditions){
        return $this->orm->update($data, $conditions);
    }
}
