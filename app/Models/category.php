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


}