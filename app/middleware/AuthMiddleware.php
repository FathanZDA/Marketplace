<?php

class AuthMiddleware
{
    public static function check()
    {
        if (!isset($_SESSION['user'])) {
            echo json_encode([
                "message" => "Unauthorized"
            ]);
            http_response_code(401);
            exit;
        }
    }
}
