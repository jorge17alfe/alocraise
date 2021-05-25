<?php

class AhorcadoController
{
    public $pdo = '';
    public function __construct()
    {
        $this->pdo = DatabaseAhorcado::StartUp();
    }

    public function registerUser()
    {
        $user = $_POST["user"];
        $email = $_POST["email"];
        $register_date = date('Y-m-d-G-i-s');
        $status = "on";
        $sql = "INSERT INTO user_ahorcado (`user`, `email`,`status`,`register_date` ) VALUES (?,?,?,?)";
        $result = $this->pdo->prepare($sql);
        $result->execute(array($user, $email, $status, $register_date));
    }
}
