<?php
namespace App\Models;

use Config\Database;
use PDO;
use PDOException;

class ORM{
    private $table;
    protected $connection;

    public function __construct(){
        $this->connection=Database::connect();
    }

    public function setTable($table){
        $this->table=$table;
    }

    public function read($conditions=[]){
        $query= "SELECT * from {$this->table}";

        try{

        if (!empty($consitions)){
            $conditionFields=[];
            foreach($conditions as $column=>$value){
                $coditionFields[]= "$column= :$column";
            }
            $query .= " WHERE " . implode(" AND " , $conditionFields);
        }

        $result = $this->connection->prepare($query);

        $result->execute($conditions);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        error_log("Error selecting records: " . $e->getMessage());
            return;
    }
    }
    

}

?>