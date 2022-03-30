<?php

class Conexao{
    private static $conn;

    private function __construct(){}

    public static function getInstance(){
        if(is_null(self::$conn)){
            self::$conn = new PDO("mysql:host=127.0.0.1; dbname=cv", "root", "");
        }
        return self::$conn;
    }
}
