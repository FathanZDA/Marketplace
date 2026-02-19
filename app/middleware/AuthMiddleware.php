<?php

class AuthMiddleware
{
    public function handle()
    {

        if (!isset($_SESSION['user'])) {
            echo "Unauthorized";
            exit;
        }
    }
}
