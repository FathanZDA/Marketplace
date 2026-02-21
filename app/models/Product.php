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

        public function create($name, $price, $user_id)
    {
        $query = "INSERT INTO products (name, price, user_id) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        return $stmt->execute([$name, $price, $user_id]);
    }

        public function update($id, $name, $price, $user_id)
    {
        $query = "UPDATE products SET name=?, price=? WHERE id=? AND user_id=?";
        $stmt = $this->conn->prepare($query);

        return $stmt->execute([$name, $price, $id, $user_id]);
    }

        public function delete($id, $user_id)
    {
        $query = "DELETE FROM products WHERE id=? AND user_id=?";
        $stmt = $this->conn->prepare($query);

        return $stmt->execute([$id, $user_id]);
    }
}