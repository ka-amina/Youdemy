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
        // var_dump($email);
        // var_dump($password);
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
        return;
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

    public function getCourses($id)
    {
        $query = "SELECT courses.id,name,title,description,level,is_published as pub,
        content_video,content_document,categories.name as category,users.username as teacher,status
        from courses
        join categories on categories.id=courses.category_id
        join users on users.id=courses.teacher_id
        where teacher_id=$id";
        $result = $this->connection->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getCourseById($id)
    {
        $query = "SELECT courses.id as course_id,name,title,description,content,content_video,content_document,level,is_published as pub,categories.name as category,users.username as teacher,courses.status,courses.created_at as created,is_completed
        from courses
        join categories on categories.id=courses.category_id
        join users on users.id=courses.teacher_id 
        left join enrollments on courses.id=enrollments.course_id 
        where courses.id=$id";
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

    public function getStudentCourses($id)
    {
        $query = "SELECT courses.id,name,title,description,level,is_published as pub,
        content_video,content_document,categories.name as category,users.username as teacher,enrollments.status
        from courses
        join categories on categories.id=courses.category_id
        join users on users.id=courses.teacher_id
        join enrollments on courses.id= enrollments.course_id
        where student_id=$id and enrollments.status='accepted' and is_completed=false";
        $result = $this->connection->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function completedCourses($id)
    {
        $query = "SELECT courses.id,name,title,description,level,is_published as pub,
        content_video,content_document,categories.name as category,users.username as teacher,enrollments.status
        from courses
        join categories on categories.id=courses.category_id
        join users on users.id=courses.teacher_id
        join enrollments on courses.id= enrollments.course_id
        where student_id=$id and enrollments.status='accepted' and is_completed=true";
        $result = $this->connection->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchCourses($search)
    {
        $query = "SELECT 
        courses.id,title,description,level,is_published as pub,content_video,content_document,
        courses.status,categories.name as category,
        users.username as teacher,
        GROUP_CONCAT(tags.name) as tags
      FROM courses
     JOIN categories ON categories.id = courses.category_id
     JOIN users ON users.id = courses.teacher_id
     LEFT JOIN cours_tags ON cours_tags.course_id = courses.id
     LEFT JOIN tags ON tags.id = cours_tags.tag_id
     WHERE 
        courses.title LIKE :search 
        OR courses.description LIKE :search
        OR categories.name LIKE :search
        OR users.username LIKE :search
        OR tags.name LIKE :search
     GROUP BY courses.id, courses.title, courses.description, courses.level, 
             courses.is_published, courses.content_video, courses.content_document,
             courses.status, categories.name, users.username
     ORDER BY courses.created_at DESC";

        $stmt = $this->connection->prepare($query);
        $searchParam = "%$search%";
        $stmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function enroll($student_id, $course_id)
    {

        $query = "INSERT INTO enrollments (student_id, course_id) 
        VALUES ($student_id, $course_id)";
        $result = $this->connection->prepare($query);
        $result->execute();
        return;
    }

    public function coursesPagination($resultsPerPage, $offset)
    {
        $query = "SELECT courses.id,name,title,description,level,is_published as pub,
        content_video,content_document,categories.name as category,users.username as teacher,status
        from courses
        join categories on categories.id=courses.category_id
        join users on users.id=courses.teacher_id
        limit $resultsPerPage offset  $offset";
        $result = $this->connection->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showCoursesRequest()
    {
        $query = "SELECT course_id,courses.title, student_id,users.username 
        from enrollments 
        join courses on courses.id=enrollments.course_id
        join users on users.id=enrollments.student_id
        where enrollments.status= 'pending'";
        $result = $this->connection->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function acceptCourse($course, $student)
    {
        $query = "UPDATE enrollments 
        set status='accepted' 
        where course_id=$course and student_id=$student";
        $result = $this->connection->prepare($query);
        $result->execute();
        return;
    }

    public function completeCourse($course)
    {
        $query = "UPDATE enrollments 
        set is_completed= true 
        where course_id=$course";
        $result = $this->connection->prepare($query);
        $result->execute();
        return;
    }

    public function deleteCourseTags($courseId)
    {
        $query = "DELETE FROM cours_tags WHERE course_id = $courseId";
        $result=$this->connection->prepare($query);
        $result->execute();
        return;
    }

    public function getPendingCourses(){
        $query="SELECT * from courses where status='pending'";
        $result=$this->connection->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function acceptTeacherCourse($id){
        $query="UPDATE courses SET status='approved' where id=$id";
        $result=$this->connection->prepare($query);
        $result->execute();
        return;

    }
    public function rejectCourse($id){
        $query="UPDATE courses SET status='rejected' where id=$id";
        $result=$this->connection->prepare($query);
        $result->execute();
        return;
    }

    public function countacceptedCourses($id) {
        $query = "SELECT count(*) as count FROM courses WHERE teacher_id = $id AND status = 'approved'";
        $result = $this->connection->prepare($query);
        $result->execute();
        
        $row = $result->fetch(PDO::FETCH_ASSOC);
        
        // Check if $row is not false and 'count' exists
        return ($row && isset($row['count'])) ? (int)$row['count'] : 0;  // Return 0 if no count found
    }
    
    public function countPendingCourses($id) {
        $query = "SELECT count(*) as count FROM courses WHERE teacher_id = $id AND status = 'pending'";
        $result = $this->connection->prepare($query);
        $result->execute();
        
        $row = $result->fetch(PDO::FETCH_ASSOC);
        
        // Check if $row is not false and 'count' exists
        return ($row && isset($row['count'])) ? (int)$row['count'] : 0;  // Return 0 if no count found
    }
    
}
