<?php

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

    public function selectAllByUserId(){
        $results = $this->conn->select("SELECT * FROM experiencia WHERE id_usuario = $this->id_usuario");
        return $results;
    }

    //Select especifico
    public function selectSpecific($id){
        $results = $this->conn->select("SELECT * FROM experi WHERE id_usuario = $this->id_usuario  AND id = $id");
        //var_dump($results);
        return $results[0];
    }

    //Metodo para alimentar a classe
    public function feedClass($user_data){

        if (count($user_data) != 0) {

            $this->setId($user_data["id"]);
            $this->setArea($user_data["area"]);
            $this->setData_inicio($user_data["data_inicio"]);
            $this->setData_termino($user_data["data_termino"]);
            $this->setDescricao($user_data["descricao"]);
            $this->setProfissao($user_data["profissao"]);
        } else {
            throw new Exception($message = "Usuario não existe");
        }
    }

    //Metodo de alimentação por valores para metodos como insert ou update
    private function pushFeedClass($area, $profissao, $data_inicio, $data_termino, $descricao){
        if ($this->getId() == null) {
            $id = "Em processo de criação";
        } else {
            $id = $this->getId();
        }
        $user_data = array(
            "area" => $area,
            "profissao" => $profissao,
            "data_inicio" => $data_inicio,
            "data_termino" => $data_termino,
            "descricao" => $descricao,
            "id" => $id,
        );

        $this->feedClass($user_data);
    }

    //Metodo de alimentação por select
    public function pullFeedClass($id){

        $user_data = $this->selectSpecific($id);

        $this->feedClass($user_data);
    }

    public function pushInsert($area, $profissao, $data_inicio, $data_termino, $descricao){

        $this->pushFeedClass($area, $profissao, $data_inicio, $data_termino, $descricao);

        $this->conn->execQuery("INSERT INTO experiencia(id_usuario,profissao,area,data_inicio,data_termino,descricao) 
        Values (
            :ID,
            :PROFISSAO,
            :AREA,
            :DATA_INICIO,
            :DATA_TERMINO,
            :DESCRICAO

        )
    ", array(
        ":ID" => $this->getId_usuario(),
        ":PROFISSAO" => $this->getProfissao(),
        ":AREA" => $this->getArea(),
        ":DATA_INICIO" => $this->getData_inicio(),
        ":DATA_TERMINO" => $this->getData_termino(),
        ":DESCRICAO" => $this->getDescricao()


    ));
    }

    public function pushUpdate($id_usuario, $area, $profissao, $data_inicio, $data_termino, $descricao){

        $this->pushFeedClass($id_usuario, $area, $profissao, $data_inicio, $data_termino, $descricao);

        $this->conn->execQuery("UPDATE experiencia  
            SET 
                id_usuario = :ID,
                area = :AREA,
                profissao = :PROFISSAO,
                data_inicio = :DATA_INICIO,
                data_termino = :DATA_TERMINO,
                descricao = :DESCRICAO
            WHERE id = $this->id
                ", array(
                ":ID" => $this->getId_usuario(),
                ":AREA" => $this->getArea(),
                ":PROFISSAO" => $this->getProfissao(),
                ":DATA_INICIO" => $this->getData_inicio(),
                ":DATA_TERMINO" => $this->getData_termino(),
                ":DESCRICAO" => $this->getDescricao(),      
            )
        );
    }

    public function delete($id){

        $this->conn->execQuery(" DELETE from cv.experiencia where id_usuario = $this->id_usuario and id = $id
        ");

    }

    public function __construct($id_usuario){
        $this->conn = new Sql();
        $this->setId_usuario($id_usuario);
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
