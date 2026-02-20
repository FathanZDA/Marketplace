<?php

require_once '../app/core/Controller.php';
require_once '../app/core/Database.php';
require_once '../app/models/Product.php';

class ProductController extends Controller
{
    public function index()
    {
        $db = new Database();
        $conn = $db->getConnection();

        $product = new Product($conn);
        $data = $product->getAll();

        $this->json($data);
    }

    public function store()
    {
        $db = new Database();
        $conn = $db->getConnection();

        $product = new Product($conn);

        $name = $_POST['name'] ?? '';
        $price = $_POST['price'] ?? '';

        if (!$name || !$price) {
            $this->json(["message" => "Data tidak lengkap"], 400);
        }

        $product->create($name, $price);

        $this->json(["message" => "Produk berhasil ditambahkan"]);
    }
    
}