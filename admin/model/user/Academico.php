<?php

//require_once("../Sql.php");
class Academico{

    private $id;
    private $id_usuario;
    private $nivel;
    private $data_inicio;
    private $data_termino;
    private $descricao;
    private $experiencia;
    private $instituicao;
    private $conn;


    public function getId(){
        return $this->id;
    }

    public function setId($value){
        $this->id = $value;
    }

    public function getId_usuario(){
        if($this->id_usuario == "Em processo de criação"){
            return null;
        }else{
            return $this->id_usuario;
        }
        
    }

    public function setId_usuario($value){
        $this->id_usuario = $value;
    }

    public function getNivel():string{
        return $this->nivel;
    }

    public function setNivel($value){
        $this->nivel = $value;
    }


    public function getData_inicio():string{
        return $this->data_inicio;
    }
 
    public function setData_inicio($value){
        $this->data_inicio = $value;
    }

    public function getData_termino():string{
        return $this->data_termino;
    }

    public function setData_termino($value){
        $this->data_termino = $value;
    }

    public function getDescricao():string{
        return $this->descricao;
    }

    public function setDescricao($value){
        $this->descricao = $value;
    }
 
    public function getExperiencia():string{
        return $this->experiencia;
    }

    public function setExperiencia($value){
        $this->experiencia = $value;
    }

    public function getInstituicao():string{
        return $this->instituicao;
    }
 
    public function setInstituicao($value){
        $this->instituicao = $value;
    }

    //Select geral
    public function selectAllByUserId(){
        $results = $this->conn->select("SELECT * FROM academico WHERE id_usuario = $this->id_usuario");
        return $results;
    }   

    //Select especifico
    public function selectSpecific($id){
        $results = $this->conn->select("SELECT * FROM academico WHERE id_usuario = $this->id_usuario  AND id = $id");
        //var_dump($results);
        return $results[0];
    }


    //Metodo para alimentar a classe
    public function feedClass($user_data){
        
        if(count($user_data) != 0){

        $this->setId($user_data["id"]);
        $this->setNivel($user_data["nivel"]);
        $this->setData_inicio($user_data["data_inicio"]);
        $this->setData_termino($user_data["data_termino"]);
        $this->setDescricao($user_data["descricao"]);
        $this->setExperiencia($user_data["experiencia"]);
        $this->setInstituicao($user_data["instituicao"]);
        
        }else{
            throw new Exception($message = "Experiência não existe");
        }
    
    }

    //Metodo de alimentação por valores para metodos como insert ou update
    private function pushFeedClass($nome_experiencia,$instituicao,$nivel,$data_inicio,$data_termino,$descricao){
        if($this->getId() == null){
            $id = "Em processo de criação";
        }else{
            $id = $this->getId();
        }
        $user_data = array(
            "experiencia" => $nome_experiencia,
            "instituicao" => $instituicao,
            "nivel" => $nivel,
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
    
    public function pushInsert($nome_experiencia,$instituicao,$nivel,$data_inicio,$data_termino,$descricao){

        $this->pushFeedClass($nome_experiencia,$instituicao,$nivel,$data_inicio,$data_termino,$descricao);

        $this->conn->execQuery("INSERT INTO academico(id_usuario,experiencia,instituicao,nivel,data_inicio,data_termino,descricao) 
        Values (
            :ID,
            :NOME_EXPERIENCIA,
            :INSTITUICAO,
            :NIVEL,
            :DATA_INICIO,
            :DATA_TERMINO,
            :DESCRICAO

        )
    ", array(
        ":ID" => $this->getId_usuario(),
        ":NOME_EXPERIENCIA" => $this->getExperiencia(),
        ":INSTITUICAO" => $this->getInstituicao(),
        ":NIVEL" => $this->getNivel(),
        ":DATA_INICIO" => $this->getData_inicio(),
        ":DATA_TERMINO" => $this->getData_termino(),
        ":DESCRICAO" => $this->getDescricao()


    ));
    }

    public function pushUpdate($nome_experiencia,$instituicao,$nivel,$data_inicio,$data_termino,$descricao){

        $this->pushFeedClass($nome_experiencia,$instituicao,$nivel,$data_inicio,$data_termino,$descricao);

        $this->conn->execQuery("UPDATE academico  
            SET 
                id_usuario = :ID,
                experiencia = :NOME_EXPERIENCIA,
                instituicao = :INSTITUICAO,
                nivel = :NIVEL,
                data_inicio = :DATA_INICIO,
                data_termino = :DATA_TERMINO,
                descricao = :DESCRICAO
            WHERE id = $this->id
                ", array(
                ":ID" => $this->getId_usuario(),
                ":NOME_EXPERIENCIA" => $this->getExperiencia(),
                ":INSTITUICAO" => $this->getInstituicao(),
                ":NIVEL" => $this->getNivel(),
                ":DATA_INICIO" => $this->getData_inicio(),
                ":DATA_TERMINO" => $this->getData_termino(),
                ":DESCRICAO" => $this->getDescricao(),      
            )
        );
    }

    public function delete($id){

            $this->conn->execQuery(" DELETE from cv.academico where id_usuario = $this->id_usuario and id = $id
            ");


    }

    public function __construct($id_usuario){
        $this->conn = new Sql();
        $this->setId_usuario($id_usuario);
    }
}

/*
try {
    $teste = new Academico(1);
    //var_dump($teste->selectAllByUserId(1));
    var_dump($teste->getId_usuario());
    $teste->pullFeedClass(20);
    var_dump($teste->getNivel());
} catch (\Throwable $th) {
    echo "erro";
}
*/