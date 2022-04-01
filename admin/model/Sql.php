<?php

require_once("Conexao.php");

class Sql{

    protected $conn;

    public function __construct(){

        $this->conn = Conexao::getInstance();

        }

    public function execQuery($rawQuery,$params = array()){
        //  var_dump($rawQuery);
        //  var_dump($params);
        $stmt = $this->conn->prepare("$rawQuery");
        $this->setParams($stmt,$params);
        //var_dump($stmt);
        $stmt->execute();
        return $stmt;
        
    }

    // Método para conectar o comando com os parâmetros
    private function setParams($stmt,$params = array()){
        foreach($params as $key => $value){
            $this->setParam($stmt,$key,$value);
        }
    }

    // Método para conectar um parâmetro por vez
    private function setParam($stmt,$key,$value){
        $stmt->bindParam($key,$value);
    }

    public function select($rawQuery){
        //var_dump($rawQuery);
        $results = $this->execQuery($rawQuery);
        return $results->fetchAll(PDO::FETCH_ASSOC);
    }
    
}




/*$s = new Sql();
var_dump($s->execQuery("INSERT INTO cv_usuario(usu_nome) VALUES(:TESTE)",array(
    ":TESTE" => "exemplo",
)));
var_dump($s->select("SELECT * FROM cv_usuario WHERE usu_id_usuario = 3"));*/