<?php
class Db {
    private $pdo;

    public function __construct($db_name) {
        $dsn = 'mysql:host=localhost;port=3306;dbname=' . $db_name;
        $username = 'root';
        $password = '';

        $this->pdo = new PDO($dsn, $username, $password);
    }

    public function getPdo() {
        return $this->pdo;
    }
}
?>