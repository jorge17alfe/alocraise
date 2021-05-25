<?php
class DatabaseAhorcado{
    
    public static function StartUp()
    {

        $servername = "mysql:host=localhost; dbname=ahorcado_1_0";
        $username = "root";
        $password = "";

        $pdo = new PDO($servername, $username, $password);
        
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $pdo->exec("SET CHARACTER SET UTF8");	

        return $pdo;
    }
}