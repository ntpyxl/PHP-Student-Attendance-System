<?php

class Database
{
    private $host = 'localhost';
    private $db_name = 'attendance_system_db';
    private $username = 'root';
    private $password = '';
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host=$this->host;dbname=$this->db_name",
                $this->username,
                $this->password
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function create($table, $data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));

        $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $statement = $this->pdo->prepare($query);

        return $statement->execute($data);
    }

    public function readAll($table, $orderBy = null)
    {
        $query = "SELECT * FROM $table";
        if ($orderBy) {
            $query .= " ORDER BY $orderBy";
        }

        $statement = $this->pdo->query($query);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readAllWhere($table, $column, $data, $orderBy = null)
    {
        $query = "SELECT * FROM $table WHERE $column = :data";
        if ($orderBy) {
            $query .= " ORDER BY $orderBy";
        }

        $statement = $this->pdo->prepare($query);
        $statement->execute(['data' => $data]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readAllAdvanced(
        $table,
        $columns = "*",
        $joins = "",
        $conditions = "",
        $params = [],
        $orderBy = null
    ) {
        $query = "SELECT $columns FROM $table";
        if (!empty($joins)) {
            $query .= " " . $joins;
        }

        if (!empty($conditions)) {
            if (is_array($conditions)) {
                $query .= " WHERE " . implode(" AND ", $conditions);
            } else {
                $query .= " WHERE " . $conditions;
            }
        }

        if ($orderBy) {
            $query .= " ORDER BY " . $orderBy;
        }

        $statement = $this->pdo->prepare($query);
        $statement->execute($params);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public function readOne($table, $column, $id)
    {
        $query = "SELECT * FROM $table WHERE $column = :id";
        $statement = $this->pdo->prepare($query);
        $statement->execute(['id' => $id]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function update($table, $data, $column, $id)
    {
        $fields = "";
        foreach ($data as $key => $value) {
            $fields .= "$key = :$key, ";
        }
        $fields = rtrim($fields, ", ");

        $query = "UPDATE $table SET $fields WHERE $column = :id";
        $data['id'] = $id;
        $statement = $this->pdo->prepare($query);

        return $statement->execute($data);
    }

    public function delete($table, $id)
    {
        $query = "DELETE FROM $table WHERE id = :id";
        $statement = $this->pdo->prepare($query);

        return $statement->execute(['id' => $id]);
    }
}
