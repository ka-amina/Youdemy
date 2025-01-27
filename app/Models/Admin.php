<?php

namespace App\Models;

class Admin extends user
{
    public function __construct()
    {
        parent::__construct();
        $this->role = "admin";
    }

    public function showUsers()
    {
        return $this->orm->read(['role' => 'user']);
    }

    public function showAllUsers()
    {
        return $this->orm->read();
    }


    public function AddUser($data)
    {
        return $this->orm->create($data);
    }

    public function getUser($id)
    {
        return $this->orm->getById($id);
    }

    public function updateUser($data, $conditions)
    {
        return $this->orm->update($data, $conditions);
    }

    public function deleteUdser($id)
    {
        return $this->orm->delete($id);
    }

    public function acceptTeacher($data, $conditions)
    {
        return $this->orm->update($data, $conditions);
    }

    public function refuseTeacher($data, $conditions)
    {
        return $this->orm->update($data, $conditions);
    }

    public function banUser($data, $conditions)
    {
        return $this->orm->update($data, $conditions);
    }

    public function countUsers(){
        return $this->orm->sum();
    }

    public function getTopUsers(){
        return $this->orm->getTopUsers();
    }

    public function getTopUsersBycourses(){
        return $this->orm->getTopUsersBycourses();
    }
    
}
