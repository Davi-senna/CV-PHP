<?php

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

    public function selectAllByUserId(){
        $results = $this->conn->select("SELECT * FROM sobre WHERE id_usuario = $this->id_usuario");
        return $results;
    }

    //Select especifico
    public function selectSpecific($id){
        $results = $this->conn->select("SELECT * FROM sobre WHERE id_usuario = $this->id_usuario  AND id = $id");
        //var_dump($results);
        return $results[0];
    }

    //Metodo para alimentar a classe
    public function feedClass($user_data){

        if (count($user_data) != 0) {

        $this->setId($user_data["id"]);
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

    //Metodo de alimentação por valores para metodos como insert ou update
    private function pushFeedClass($idade, $email, $telefone, $numero, $rua, $cidade, $estado, $pais, $conteudo){
        if ($this->getId() == null) {
            $id = "Em processo de criação";
        } else {
            $id = $this->getId();
        }
        $user_data = array(
            "idade" => $idade,
            "email" => $email,
            "telefone" => $telefone,
            "numero" => $numero,
            "rua" => $rua,
            "cidade" => $cidade,
            "estado" => $estado,
            "pais" => $pais,
            "conteudo" => $conteudo,
            "id" => $id
        );

        $this->feedClass($user_data);
    }

    //Metodo de alimentação por select
    public function pullFeedClass($id){

        $user_data = $this->selectSpecific($id);

        $this->feedClass($user_data);
    }

    public function pushInsert($idade, $email, $telefone, $numero, $rua, $cidade, $estado, $pais, $conteudo){

        $this->pushFeedClass($idade, $email, $telefone, $numero, $rua, $cidade, $estado, $pais, $conteudo);

        $this->conn->execQuery("INSERT INTO sobre(id_usuario,email,telefone,numero,rua,cidade,estado,pais,conteudo) 
        Values (
            :ID,
            :EMAIL,
            :TELEFONE,
            :NUMERO,
            :RUA,
            :CIDADE,
            :ESTADO,
            :PAIS,
            :CONTEUDO

        )
    ", array(
        ":ID" => $this->getId_usuario(),
        ":EMAIL" => $this->getEmail(),
        ":TELEFONE" => $this->getTelefone(),
        ":NUMERO" => $this->getNumero(),
        ":RUA" => $this->getRua(),
        ":CIDADE" => $this->getCidade(),
        ":ESTADO" => $this->getEstado(),
        ":PAIS" => $this->getPais(),
        ":CONTEUDO" => $this->getConteudo()


    ));
    }

    public function pushUpdate($idade, $email, $telefone, $numero, $rua, $cidade, $estado, $pais, $conteudo){

        $this->pushFeedClass($idade, $email, $telefone, $numero, $rua, $cidade, $estado, $pais, $conteudo);

        $this->conn->execQuery("UPDATE sobre  
            SET 
                idade = :IDADE,
                email = :EMAIL,
                telefone = :TELEFONE,
                numero = :NUMERO,
                rua = :RUA,
                cidade = :CIDADE,
                estado = :ESTADO,
                pais = :PAIS,
                conteudo = :CONTEUDO
            WHERE id_usuario = $this->id_usuario
                ", array(
                ":IDADE" => $this->getIdade(),
                ":EMAIL" => $this->getEmail(),
                ":TELEFONE" => $this->getTelefone(),
                ":NUMERO" => $this->getNumero(),
                ":RUA" => $this->getRua(),
                ":CIDADE" => $this->getCidade(),
                ":ESTADO" => $this->getEstado(), 
                ":PAIS" => $this->getPais(), 
                ":CONTEUDO" => $this->getConteudo()       
            )
        );
    }

    public function delete($id){

        $this->conn->execQuery(" DELETE from cv.sobre where id_usuario = $this->id_usuario and id = $id
        ");

    }

    public function __construct($id_usuario){
        $this->conn = new Sql();
        $this->setId_usuario($id_usuario);
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
