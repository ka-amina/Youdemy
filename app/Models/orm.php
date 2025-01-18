<?php

namespace App\Models;

use config\Database;
use PDO;
use PDOException;

class ORM
{
    private $table;
    protected $connection;

    public function __construct()
    {
        $this->connection = Database::connect();
    }

    public function setTable($table)
    {
        $this->table = $table;
    }

    public function read($conditions = [])
    {
        $query = "SELECT * from {$this->table}";

        try {

            if (!empty($conditions)) {
                $conditionFields = [];
                foreach ($conditions as $column => $value) {
                    $conditionFields[] = "$column = :$column";
                }
                $query .= " WHERE " . implode(" AND ", $conditionFields);
            }

            $result = $this->connection->prepare($query);

            $result->execute($conditions);

            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error selecting records: " . $e->getMessage());
            return;
        }
    }

    public function delete($conditions)
    {
        $conditionsFields = [];
        foreach ($conditions as $column => $value) {
            $conditionsFields[] = "$column = :$column";
        }
        try {
            $query = "DELETE FROM {$this->table} where " . implode(" AND ", $conditionsFields);
            $result = $this->connection->prepare($query);
            $result->execute($conditions);
            return $result->rowCount();
        } catch (PDOException $e) {
            error_log("Error selecting records: " . $e->getMessage());
            return;
        }
    }

    public function update($data, $conditions)
    {
        $conditionFields = [];
        
        foreach ($conditions as $column => $value) {
            $conditionFields[] = "$column = :$column";
        }
        $updateDataFields = [];
        foreach ($data as $column => $value) {
            $updateDataFields[] = "$column = :$column";
        }
        var_dump($conditionFields);
        var_dump($updateDataFields);
        try {
            $query = "UPDATE {$this->table} SET " . implode(", ", $updateDataFields) . " WHERE " . implode(" AND ", $conditionFields);
            $result = $this->connection->prepare($query);
            $result->execute(array_merge($data, $conditions));
            // var_dump($result);
            return;
        } catch (PDOException $e) {
            error_log("Error selecting records: " . $e->getMessage());
            return;
        }
    }

    public function create($data)
    {
        $columns = implode(",", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        print_r($data);
        try {
            $query = "INSERT  INTO {$this->table} ($columns) VALUES ($values) ";
            $result = $this->connection->prepare($query);
            $result->execute($data);
            return;
        } catch (PDOException $e) {
            error_log("Error selecting records: " . $e->getMessage());
            return;
        }
    }

    public function getById($id)
    {
        try {
            $query = "SELECT * FROM {$this->table} WHERE id=$id";
            $result = $this->connection->prepare($query);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error selecting records: " . $e->getMessage());
            return;
        }
    }

    public function sum()
    {
        try {
            $query = "SELECT COUNT(*) as total from {$this->table}";
            $result = $this->connection->prepare($query);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC)['total'];
        } catch (PDOException $e) {
            error_log("Error selecting records: " . $e->getMessage());
            return;
        }
    }

    public function login($email, $password)
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $result = $this->connection->prepare($query);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if ($result->rowCount() > 0) {
            if (password_verify($password, $row["password_hash"])) {
                return $row;
            }
            return false;
        }
    }


    public function getLastcourseId()
    {
        $query = "SELECT * from courses order by created_At desc limit 1;";
        $result = $this->connection->prepare($query);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function createcourseTags($data)
    {
        $columns = implode(",", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        print_r($data);
        $query = "INSERT  INTO cours_tags ($columns) VALUES ($values) ";
        $result = $this->connection->prepare($query);
        $result->execute($data);
        return;
    }

    public function getCourses()
    {
        $query = 'SELECT courses.id,name,title,description,level,is_published as pub,categories.name as category,users.username as teacher,status
        from courses
        join categories on categories.id=courses.category_id
        join users on users.id=courses.teacher_id';
        $result = $this->connection->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getCourseById($id)
    {
        $query = "SELECT courses.id as course_id,name,title,description,content,content_video,content_document,level,is_published as pub,categories.name as category,users.username as teacher,status
        from courses
        join categories on categories.id=courses.category_id
        join users on users.id=courses.teacher_id where courses.id=$id";
        $result = $this->connection->prepare($query);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function getTagsNameById($id)
    {
        $query = "SELECT name from cours_tags
        join tags on tags.id=cours_tags.tag_id where course_id =$id";
        $result = $this->connection->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTopUsers()
    {
        $query = "SELECT 
     users.id,profile_picture_url, username, 
     COUNT(courses.id) AS courses_Count 
     FROM courses 
     JOIN users ON users.id = courses.teacher_id 
     GROUP BY users.id 
     ORDER BY courses_Count DESC 
     LIMIT 3";
     $result = $this->connection->prepare($query);
     $result->execute();
     return $result->fetchAll(PDO::FETCH_ASSOC);

     
    }
    
    
}
