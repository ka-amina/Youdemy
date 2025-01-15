<?php

namespace App\Models;

use App\Models\ORM;

class Tag
{
    private string $table = 'tags';
    private $orm;

    public function __construct()
    {
        $this->orm = new ORM();
        $this->orm->setTable($this->table);
    }


    public function  getTags(): array
    {
        return $this->orm->read();
    }

    public function createTag(array $data){
        return $this->orm->create($data);
    }

    public function getTagById($id): ?array
    {
        return $this->orm->getById($id);
    }

    public function updateTag($data,$conditions)
    {
        return $this->orm->update($data, $conditions);
    }

    public function deleteTag($id){
        return $this->orm->delete($id);
    }
}
