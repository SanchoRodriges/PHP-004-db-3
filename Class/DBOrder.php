<?php

namespace Class;
use PDO;
class DBOrder extends DBClass
{
    protected string $tableName = '`order`';

    public function createTable(): void {
        $sql = "CREATE TABLE $this->tableName (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            created_at DATETIME,
            shop_id INTEGER,
            client_id INTEGER
        );";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }
}
