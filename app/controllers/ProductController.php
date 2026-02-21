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

        $this->view('products/index', $data);
    }

        public function store()
    {
        session_start();

        $db = new Database();
        $conn = $db->getConnection();

        $product = new Product($conn);

        $name = $_POST['name'];
        $price = $_POST['price'];
        $user_id = $_SESSION['user']['id'];

        $product->create($name, $price, $user_id);

        header("Location: index.php?url=products");
        exit;
    }
    
            public function update()
    {
        session_start();

        $db = new Database();
        $conn = $db->getConnection();

        $product = new Product($conn);

        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $user_id = $_SESSION['user']['id'];

        $product->update($id, $name, $price, $user_id);

        header("Location: index.php?url=products");
        exit;
    }

            public function delete()
    {
        session_start();
    
        $db = new Database();
        $conn = $db->getConnection();
    
        $product = new Product($conn);
    
        $id = $_POST['id'];
        $user_id = $_SESSION['user']['id'];
    
        $product->delete($id, $user_id);
    
        header("Location: index.php?url=products");
        exit;
    }


}