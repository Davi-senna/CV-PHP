<?php

require_once("../Sql.php");

class Sobre{

    private $id;
    private $id_usuario;
    private $idade;
    private $email;
    private $telefone;
    private $numero;
    private $rua;
    private $cidade;
    private $estado;
    private $pais;
    private $conteudo;
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

    public function getIdade(){
        return $this->idade;
    }

    public function setIdade($value){
        $this->idade = $value;
    }


    public function getEmail(){
        return $this->email;
    }
 
    public function setEmail($value){
        $this->email = $value;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($value){
        $this->telefone = $value;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($value){
        $this->numero = $value;
    }
 
    public function getRua(){
        return $this->rua;
    }

    public function setRua($value){
        $this->rua = $value;
    }

    public function getCidade(){
        return $this->cidade;
    }
 
    public function setCidade($value){
        $this->cidade = $value;
    }

    public function getEstado(){
        return $this->estado;
    }
 
    public function setEstado($value){
        $this->estado = $value;
    }

    public function getPais(){
        return $this->pais;
    }
 
    public function setPais($value){
        $this->pais = $value;
    }

    public function getConteudo(){
        return $this->conteudo;
    }
 
    public function setConteudo($value){
        $this->conteudo = $value;
    }

    public function selectAllByUserId($id){
        $results = $this->conn->select("SELECT * FROM sobre WHERE id_usuario = $id");
        return $results;
    }   

    public function __construct($id_usuario,$id){
        $this->conn = new Sql();
        
        $results = $this->conn->select("SELECT * FROM sobre WHERE id_usuario = $id_usuario  AND id = $id");
        //var_dump($results);
        if(count($results) != 0){
        $user_data = $results[0];

        $this->setId($user_data["id"]);
        $this->setId_usuario($user_data["id_usuario"]);
        $this->setIdade($user_data["idade"]);
        $this->setEmail($user_data["email"]);
        $this->setTelefone($user_data["telefone"]);
        $this->setNumero($user_data["numero"]);
        $this->setRua($user_data["rua"]);
        $this->setCidade($user_data["cidade"]);
        $this->setEstado($user_data["estado"]);
        $this->setPais($user_data["pais"]);
        $this->setConteudo($user_data["conteudo"]);
        
        }else{
            throw new Exception($message = "Usuario não existe");
        }
    
    }

}

/*
try {
    $teste = new Sobre(1,1);
    var_dump($teste->selectAllByUserId(1));
} catch (\Throwable $th) {
    echo "erro";
}
*/
