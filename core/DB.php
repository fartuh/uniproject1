<?php

class DB
{
    public static function getVar(){
        $pdo = new PDO("mysql:host=localhost;dbname=project;charset=utf8", "admin", "adminpassword");
        return $pdo;
    }
}

?>
