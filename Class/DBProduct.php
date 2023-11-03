<?php

namespace Class;
use PDO;
class DBProduct extends DBClass
{
    protected string $tableName = 'product';

    public function createTable(): void {
        $sql = "CREATE TABLE $this->tableName (
          id INTEGER PRIMARY KEY AUTOINCREMENT,
          name VARCHAR(20),
          price FLOAT,
          count INTEGER,
          shop_id INTEGER
        );";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }
}
