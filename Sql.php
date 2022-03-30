<?php


class Sql extends PDO{

    private $conn;

    public function __construct(){

        $this->conn = new PDO("mysql:host=127.0.0.1; dbname=cv", "root", "");
        }

    public function execQuery($rawQuery,$params = array()){

        $stmt = $this->conn->prepare("$rawQuery");
        $stmt->execute();
        return $stmt;
        

    }

    public function select($rawQuery){
        $results = $this->execQuery($rawQuery);
        return $results->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function disconnect(){
        $this->conn = null;
    }
}
