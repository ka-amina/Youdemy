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
}
