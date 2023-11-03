<?php

namespace Class;
use PDO;
class DBShop extends DBClass
{
    protected string $tableName = 'shop';

    public function createTable(): void {
        $sql = "CREATE TABLE $this->tableName (
          id INTEGER PRIMARY KEY AUTOINCREMENT,
          name VARCHAR(20),
          address VARCHAR(50)
        );";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }
}
