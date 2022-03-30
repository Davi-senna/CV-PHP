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

    public function __construct($id){
        $this->conn = new Sql();
        $results = $this->conn->select("SELECT * FROM cv_usuario WHERE usu_id_usuario = $id");
        //var_dump($results);

        if(count($results) == 1){
        $user_data = $results[0];

        $this->setId($user_data["usu_id_usuario"]);
        $this->setNome($user_data["usu_nome"]);
        $this->setEmail($user_data["usu_email"]);
        $this->setSenha($user_data["usu_senha"]);
        $this->setLogin($user_data["usu_login"]);
        $this->setStatus($user_data["usu_status"]);
        
        }else{
            throw new Exception($message = "Usuario não existe");
        }
        
    }
}

/*
try {
    $teste = new Usuario(2);
} catch (\Throwable $th) {
    echo "erro";
}
*/