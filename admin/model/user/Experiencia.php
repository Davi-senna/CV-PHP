<?php

require_once("../Sql.php");

class Experiencia{

    private $id;
    private $id_usuario;
    private $area;
    private $data_inicio;
    private $data_termino;
    private $descricao;
    private $profissao;
    private $conn;


    public function getId(){
        return $this->id;
    }

    public function setId($value){
        $this->id = $value;
    }

    public function getId_usuario(){
        return $this->id_usuario;
    }

    public function setId_usuario($value){
        $this->id_usuario = $value;
    }

    public function getArea(){
        return $this->area;
    }

    public function setArea($value){
        $this->area = $value;
    }


    public function getData_inicio(){
        return $this->data_inicio;
    }
 
    public function setData_inicio($value){
        $this->data_inicio = $value;
    }

    public function getData_termino(){
        return $this->data_termino;
    }

    public function setData_termino($value){
        $this->data_termino = $value;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($value){
        $this->descricao = $value;
    }
 
    public function getProfissao(){
        return $this->profissao;
    }

    public function setProfissao($value){
        $this->profissao = $value;
    }

    public function selectAllByUserId($id){
        $results = $this->conn->select("SELECT * FROM experiencia WHERE id_usuario = $id");
        return $results;
    }   

    public function __construct($id_usuario,$id){
        $this->conn = new Sql();
        
        $results = $this->conn->select("SELECT * FROM experiencia WHERE id_usuario = $id_usuario  AND id = $id");
        //var_dump($results);
        if(count($results) != 0){
        $user_data = $results[0];

        $this->setId($user_data["id"]);
        $this->setId_usuario($user_data["id_usuario"]);
        $this->setArea($user_data["area"]);
        $this->setData_inicio($user_data["data_inicio"]);
        $this->setData_termino($user_data["data_termino"]);
        $this->setDescricao($user_data["descricao"]);
        $this->setProfissao($user_data["profissao"]);
        
        }else{
            throw new Exception($message = "Usuario não existe");
        }
    
    }

}

/*
try {
    $teste = new Experiencia(1,14);
    var_dump($teste->selectAllByUserId(1));
} catch (\Throwable $th) {
    echo "erro";
}
*/
