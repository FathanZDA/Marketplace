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

        public function login()
    {
        session_start();
    
        $db = new Database();
        $conn = $db->getConnection();
    
        $userModel = new User($conn);
    
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
    
        if (!$email || !$password) {
            $this->json(["message" => "Email dan password wajib diisi"], 400);
        }
    
        $user = $userModel->findByEmail($email);
    
        if (!$user) {
            $this->json(["message" => "User tidak ditemukan"], 404);
        }
    
        if (!password_verify($password, $user['password'])) {
            $this->json(["message" => "Password salah"], 401);
        }
    
        $_SESSION['user'] = [
            "id" => $user["id"],
            "name" => $user["name"],
            "email" => $user["email"]
        ];
    
        $this->json([
            "message" => "Login berhasil",
            "user" => $_SESSION['user']
        ]);
    }


}
