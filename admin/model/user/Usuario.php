<?php

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
    private function feedClass($user_data){
        
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
    private function pushFeedClass($nome,$email,$senha,$login,$status){
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
            "usu_id_usuario" => $id
        );

        $this->feedClass($user_data);
    }

    //Metodo de alimentação por select
    private function pullFeedClass(){

        $user_data = $this->selectSpecific();

        $this->feedClass($user_data);
    }

    //Select especifico
    public function selectSpecific(){
        $results = $this->conn->select("SELECT * FROM cv_usuario WHERE usu_id_usuario = $this->id");
        //var_dump($results);
        return $results[0];
    }

    public function selectAllUser(){
        $results = $this->conn->select("SELECT * FROM cv_usuario");
        return $results;
    }

    public function pushInsert($nome,$email,$senha,$login,$status){

        $this->pushFeedClass($nome,$email,$senha,$login,$status);

        $this->conn->execQuery("INSERT INTO cv_usuario(nome,email,senha,login,status) 
        Values (
            :NOME,
            :EMAIL,
            :SENHA,
            :LOGIN,
            :STATUS

        )
    ", array(
        ":NOME" => $this->getNome(),
        ":EMAIL" => $this->getEmail(),
        ":SENHA" => $this->getSenha(),
        ":LOGIN" => $this->getLogin(),
        ":STATUS" => $this->getStatus()

    ));
    }

    
    public function pushUpdate($nome,$email,$senha,$login,$status){

        $this->pushFeedClass($nome,$email,$senha,$login,$status);

        $this->conn->execQuery("UPDATE cv_usuario  
            SET 
                nome = :NOME,
                email = :EMAIL,
                senha = :SENHA,
                login = :LOGIN,
                status = :STATUS

            WHERE usu_id_usuario = $this->id
                ", array(
                ":NOME" => $this->getNome(),
                ":EMAIL" => $this->getEmail(),
                ":SENHA" => $this->getSenha(),
                ":LOGIN" => $this->getLogin(),
                ":STATUS" => $this->getStatus()
            )
        );
    }

    public function delete($id){
        $this->setId($id);
        $this->pullFeedClass();

        if($this->getId() == "Em processo de criação"){
            throw new Exception($message = "Usuario em processo de criação e não pode ser deletada");
        }else{
            $this->conn->execQuery(" DELETE from cv.cv_usuario where usu_id_usuario = $this->id");
        }

    }

    public function validUser($login,$senha){

        $user_data = $this->conn->select("SELECT * FROM cv_usuario WHERE login = $login");

        if(!empty($user_data)){

            if($user_data[0]["senha"] == $senha){
                    return array(
                        "valid" => 1,
                        "id" => $user_data[0]["usu_id_usuario"],
                        "objectUser" => new Usuario($user_data[0]["usu_id_usuario"])
                    );
            }else{
                return array(
                    "valid" => 0,
                    "error" => "Senha invalida"
                );
            }

        }else{
            return array(
                "valid" => 0,
                "error" => "Login não encontrado"
            );
        }   

    }
}

//adicionar tratamento de erros


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
var_dump($teste3->getEmail());
*/

/*
$teste4 = new Usuario(1);
$teste4->pushFeedClass("teste2","teste2","teste2","teste2",1);
$teste4->pushInsert();
*/

/*
$teste5 = new Usuario(6);
$teste5->pullFeedClass();
var_dump($teste5->getId());
$teste5->pushUpdate("tdoaaa","testando","test","test",1);
*/

/*
$teste6 = new Usuario(9);
$teste6->pullFeedClass();
var_dump($teste6->getId());
$teste6->delete();
*/

/*
$teste7 = new Usuario();
var_dump($teste7->validUser("'davifsena2@gmail.com'","085a7fda2455056e6ce2042a1dcfb759"));
*/