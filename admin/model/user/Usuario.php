<?php

require_once("../Sql.php");

class Usuario{

    private $id;
    private $nome;
    private $email;
    private $senha;
    private $login;
    private $status;
    private $conn;


    public function getId(){
        return $this->id;
    }

    public function setId($value){
        $this->id = $value;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($value){
        $this->nome = $value;
    }
    
    public function getEmail(){
        return $this->email;
    }

    public function setEmail($value){
        $this->email = $value;
    }
    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($value){
        $this->senha = $value;
    }
    public function getLogin(){
        return $this->login;
    }

    public function setLogin($value){
        $this->login = $value;
    }
    public function getStatus(){
        return $this->status;
    }

    public function setStatus($value){
        $this->status = $value;
    }

    public function __construct($id_usuario = "Em processo de criação"){
        $this->conn = new Sql();
        $this->setId($id_usuario);
    }

    //Metodo para alimentar a classe
    public function feedClass($user_data){
        
        if(count($user_data) != 0){

            $this->setId($user_data["usu_id_usuario"]);
            $this->setNome($user_data["nome"]);
            $this->setEmail($user_data["email"]);
            $this->setSenha($user_data["senha"]);
            $this->setLogin($user_data["login"]);
            $this->setStatus($user_data["status"]);
        
        }else{
            throw new Exception($message = "Experiência não existe");
        }
    
    }

    //Metodo de alimentação por valores para metodos como insert ou update
    public function pushFeedClass($nome,$email,$senha,$login,$status){
        if($this->getId() == null){
            $id = "Em processo de criação";
        }else{
            $id = $this->getId();
        }
        $user_data = array(
            "nome" => $nome,
            "email" => $email,
            "senha" => $senha,
            "login" => $login,
            "status" => $status,
            "id" => $id,
        );

        $this->feedClass($user_data);
    }

    //Metodo de alimentação por select
    public function pullFeedClass(){

        $user_data = $this->selectSpecific();

        $this->feedClass($user_data);
    }

    //Select especifico
    public function selectSpecific(){
        $results = $this->conn->select("SELECT * FROM cv_usuario WHERE usu_id_usuario = $this->id");
        //var_dump($results);
        return $results[0];
    }

    public function selectAll(){
        $results = $this->conn->select("SELECT * FROM cv_usuario");
        return $results;
    }
}




/*
try {
    $teste = new Usuario(2);
} catch (\Throwable $th) {
    echo "erro";
}
*/

/*
$teste2 = new Usuario();
$teste2->pushFeedClass("teste","teste","teste","teste","teste");
var_dump($teste2->getId());
*/


/*
$teste3 = new Usuario(7);
$teste3->pullFeedClass();
var_dump($teste3->getEmail());*/

