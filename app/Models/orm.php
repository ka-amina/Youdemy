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

            if (!empty($consitions)) {
                $conditionFields = [];
                foreach ($conditions as $column => $value) {
                    $coditionFields[] = "$column= :$column";
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
        try {
            $query = "UPDATE {$this->table} SET " . implode(", ", $updateDataFields) . " WHERE " . implode(" AND ", $conditionFields);
            $result = $this->connection->prepare($query);
            $result->execute(array_merge($data, $conditions));
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
}
