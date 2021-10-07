<?php
class Database{
    
    public static function StartUp()
    {
        // // DATABASE MICARTAONLINE
        // $servername = "mysql:host=db5003116412.hosting-data.io; dbname=dbs2512105";
        // $username = "dbu2237934";
        // $password = "alocraise1+";
        
        
        // // DATABASE LOCAL XAMPP
        $servername = "mysql:host=localhost; dbname=aloc_raise2.0";
        $username = "root";
        $password = "";

        $pdo = new PDO($servername, $username, $password);
        
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $pdo->exec("SET CHARACTER SET UTF8");	

        return $pdo;
    }
}