<?php

require_once '../app/core/Controller.php';
require_once '../app/core/Database.php';
require_once '../app/models/User.php';

class AuthController extends Controller
{
    public function register()
    {
        $db = new Database();
        $conn = $db->getConnection();

        $userModel = new User($conn);

        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (!$name || !$email || !$password) {
            $this->json(["message" => "All fields are required"], 400);
        }

        $userModel->createUser($name, $email, $password);

        $this->json(["message" => "User created"]);
    }
}
