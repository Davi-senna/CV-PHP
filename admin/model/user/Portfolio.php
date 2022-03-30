<?php

require_once("../Sql.php");

class Portfolio{

    private $id;
    private $id_usuario;
    private $nome;
    private $image_source;
    private $link;
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

    public function getNome(){
        return $this->nome;
    }

    public function setNome($value){
        $this->nome = $value;
    }


    public function getImage_source(){
        return $this->image_source;
    }
 
    public function setImage_source($value){
        $this->image_source = $value;
    }

    public function getLink(){
        return $this->link;
    }

    public function setLink($value){
        $this->link = $value;
    }

    public function selectAllByUserId($id){
        $results = $this->conn->select("SELECT * FROM imagens_portfolio WHERE id_usuario = $id");
        return $results;
    }   

    public function __construct($id_usuario,$id){
        $this->conn = new Sql();
        
        $results = $this->conn->select("SELECT * FROM imagens_portfolio WHERE id_usuario = $id_usuario  AND id = $id");
        //var_dump($results);
        if(count($results) != 0){
        $user_data = $results[0];

        $this->setId($user_data["id"]);
        $this->setId_usuario($user_data["id_usuario"]);
        $this->setNome($user_data["nome"]);
        $this->setImage_source($user_data["image_source"]);
        $this->setLink($user_data["link"]);
        
        }else{
            throw new Exception($message = "Usuario não existe");
        }
    
    }

}

/*
try {
    $teste = new Portfolio(1,11);
    var_dump($teste->selectAllByUserId(1));
} catch (\Throwable $th) {
    echo "erro";
}
*/