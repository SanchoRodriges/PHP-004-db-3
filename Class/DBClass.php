<?php

namespace Class;
use PDO;
class DBClass implements DatabaseWrapper
{
    protected string $tableName = '';
    protected string $DBHost = 'sqlite:C:\xampp\htdocs\PHP-004-db-2\php-004-db';
    protected object $pdo;

    public function __construct()
    {
        $this->pdo = new PDO($this->DBHost);
    }
    public function insert(array $tableColumns, array $values): array
    {
        $sql = "INSERT INTO $this->tableName (";
        $sql .= implode(', ', $tableColumns);
        $sql .= ') VALUES (';
        for ($i = 0; $i < count($values); $i++) {
            $values[$i] = '"'.$values[$i].'"';
        }
        $sql .= implode(', ',$values);
        $sql .= ');';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $this->find($this->pdo->lastInsertId());
    }

    public function update(int $id, array $values): array
    {
        $sql = "UPDATE $this->tableName ";
        $sql .= 'SET ';
        $preArr = [];
        foreach ($values as $key => $value) {
            $preArr[] = "$key = '$value'";
        }
        $sql .= implode(', ', $preArr);
        $sql .= " WHERE id = $id;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $this->find($id);
    }

    public function find(int $id): array
    {
        $sql = "SELECT * FROM $this->tableName WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM $this->tableName WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}
