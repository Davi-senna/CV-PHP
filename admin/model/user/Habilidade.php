<?php

require_once("../Sql.php");

class Habilidade{

    private $id;
    private $id_usuario;
    private $nome_habilidade;
    private $nivel_habilidade;
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

    public function getNome_habilidade(){
        return $this->nome_habilidade;
    }

    public function setNome_habilidade($value){
        $this->nome_habilidade = $value;
    }


    public function getNivel_habilidade(){
        return $this->nivel_habilidade;
    }
 
    public function setNivel_habilidade($value){
        $this->nivel_habilidade = $value;
    }

    public function selectAllByUserId($id){
        $results = $this->conn->select("SELECT * FROM habilidades WHERE id_usuario = $id");
        return $results;
    }   

    public function __construct($id_usuario,$id){
        $this->conn = new Sql();
        
        $results = $this->conn->select("SELECT * FROM habilidades WHERE id_usuario = $id_usuario  AND id = $id");
        //var_dump($results);
        if(count($results) != 0){
        $user_data = $results[0];

        $this->setId($user_data["id"]);
        $this->setId_usuario($user_data["id_usuario"]);
        $this->setNome_habilidade($user_data["nome_habilidade"]);
        $this->setNivel_habilidade($user_data["nivel_habilidade"]);
        
        }else{
            throw new Exception($message = "Usuario não existe");
        }
    
    }

}

/*
try {
    $teste = new Habilidade(1,31);
    var_dump($teste->selectAllByUserId(1));
} catch (\Throwable $th) {
    echo "erro";
}
*/
