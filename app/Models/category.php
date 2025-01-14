<?php
namespace App\Models;

use App\Models\ORM;

class Category {
    private $table = 'categories';
    protected $orm;

    public function __construct() {
        $this->orm = new ORM();
        $this->orm->setTable($this->table); 
    }


    public function getCategories() {
        return $this->orm->read();
    }

    public function createCategory(array $data){
        return $this->orm->create($data);
    }

    public function getCategryById($id){
        return $this->orm->getById($id);
    }

    public function updateCategory($data, $conditions){
        return $this->orm->update($data, $conditions);
    }


}
