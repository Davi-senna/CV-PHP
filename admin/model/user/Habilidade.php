<?php

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

    public function selectAllByUserId(){
        $results = $this->conn->select("SELECT * FROM habilidades WHERE id_usuario = $this->id_usuario");
        return $results;
    }   

    //Select especifico
    public function selectSpecific($id){
        $results = $this->conn->select("SELECT * FROM habilidades WHERE id_usuario = $this->id_usuario  AND id = $id");
        //var_dump($results);
        return $results[0];
    }

    public function feedClass($user_data){
        
        if(count($user_data) != 0){

        $this->setId($user_data["id"]);
        $this->setNome_habilidade($user_data["nome_habilidade"]);
        $this->setNivel_habilidade($user_data["nivel_habilidade"]);
        
        }else{
            throw new Exception($message = "Usuario não existe");
        }
    
    }

    public function __construct($id_usuario){
        $this->conn = new Sql();
        $this->setId_usuario($id_usuario);
    }

    //Metodo de alimentação por valores para metodos como insert ou update
    private function pushFeedClass($nome_habilidade,$nivel_habilidade){
        if($this->getId() == null){
            $id = "Em processo de criação";
        }else{
            $id = $this->getId();
        }
        $user_data = array(
            "nome_habilidade" => $nome_habilidade,
            "nivel_habilidade" => $nivel_habilidade,
            "id" => $id,
        );

        $this->feedClass($user_data);
    }

    //Metodo de alimentação por select
    public function pullFeedClass($id){

        $user_data = $this->selectSpecific($id);

        $this->feedClass($user_data);
    }

    public function pushInsert($nome_habilidade,$nivel_habilidade){

        $this->pushFeedClass($nome_habilidade,$nivel_habilidade);

        $this->conn->execQuery("INSERT INTO habilidades(id_usuario,nome_habilidade,nivel_habilidade) 
        Values (
            :ID,
            :NOME_HABILIDADE,
            :NIVEL_HABILIDADE
        )",
        array(
            ":ID" => $this->getId_usuario(),
            ":NOME_HABILIDADE" => $this->getNome_habilidade(),
            ":NIVEL_HABILIDADE" => $this->getNivel_habilidade()

        ));
    }

    public function pushUpdate($nome_habilidade,$nivel_habilidade){

        $this->pushFeedClass($nome_habilidade,$nivel_habilidade);

        $this->conn->execQuery("UPDATE habilidades 
            SET 
                id_usuario = :ID,
                nome_habilidade = :NOME_HABILIDADE,
                nivel_habilidade = :NIVEL_HABILIDADE,

            WHERE id = $this->id
                ", array(
                ":ID" => $this->getId_usuario(),
                ":NOME_HABILIDADE" => $this->getNome_habilidade(),
                ":NIVEL_HABILIDADE" => $this->getNivel_habilidade()

                )
        );
    }

    public function delete($id){

        $this->conn->execQuery(" DELETE from cv.habilidades where id_usuario = $this->id_usuario and id = $id
        ");


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
