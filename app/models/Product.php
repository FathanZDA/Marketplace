<?php

class Product
{
    private $conn;
    private $table = "products";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $price)
    {
        $query = "INSERT INTO " . $this->table . " (name, price) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);

        return $stmt->execute([$name, $price]);
    }
}