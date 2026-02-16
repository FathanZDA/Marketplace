<?php

class Database
{
    private $pdo;

    public function __construct()
    {
        $config = require '../config/database.php';

        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";

        try {
            $this->pdo = new PDO($dsn, $config['username'], $config['password']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed");
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
