<?php

class User
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function createUser($nama, $email, $password)
    {
        $query = "INSERT INTO users (nama, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        return $stmt->execute([$nama, $email, $hashedPassword]);
    }
}
