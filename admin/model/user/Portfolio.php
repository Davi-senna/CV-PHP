<?php

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

    public function selectAllByUserId(){
        $results = $this->conn->select("SELECT * FROM imagens_portfolio WHERE id_usuario = $this->id_usuario");
        return $results;
    }

    public function selectSpecific($id){
        $results = $this->conn->select("SELECT * FROM imagens_portfolio WHERE id_usuario = $this->id_usuario  AND id = $id");
        //var_dump($results);
        return $results[0];
    }

    public function feedClass($user_data){

        if (count($user_data) != 0) {

        $this->setId($user_data["id"]);
        $this->setNome($user_data["nome"]);
        $this->setImage_source($user_data["image_source"]);
        $this->setLink($user_data["link"]);
        
        }else{
            throw new Exception($message = "Usuario não existe");
        }
    
    }

    //Metodo de alimentação por valores para metodos como insert ou update
    private function pushFeedClass($nome, $image_source, $link){
        if ($this->getId() == null) {
            $id = "Em processo de criação";
        } else {
            $id = $this->getId();
        }
        $user_data = array(
            "nome" => $nome,
            "image_source" => $image_source,
            "link" => $link,
            "id" => $id
        );

        $this->feedClass($user_data);
    }

    //Metodo de alimentação por select
    public function pullFeedClass($id){

        $user_data = $this->selectSpecific($id);

        $this->feedClass($user_data);
    }

    public function pushInsert($nome, $image_source, $link){

        $this->pushFeedClass($nome, $image_source, $link);

        $this->conn->execQuery("INSERT INTO imagens_portfolio(id_usuario,nome,image_source,link) 
        Values (
            :ID,
            :NOME,
            :IMAGE_SOURCE,
            :LINK

        )
    ", array(
        ":ID" => $this->getId_usuario(),
        ":NOME" => $this->getNome(),
        ":IMAGE_SOURCE" => $this->getImage_source(),
        ":LINK" => $this->getLink()

    ));
    }

    public function pushUpdate($nome, $image_source, $link){

        $this->pushFeedClass($nome, $image_source, $link);

        $this->conn->execQuery("UPDATE imagens_portfolio  
            SET 
                image_source = :IMAGE_SOURCE,
                nome = :NOME,
                link = :LINK

            WHERE id = $this->id
                ", array(
                ":IMAGE_SOURCE" => $this->getImage_source(),
                ":NOME" => $this->getNome(),
                ":LINK" => $this->getLink()   
            )
        );
    }

    public function delete($id){

        $this->conn->execQuery(" DELETE from cv.imagens_portfolio where id_usuario = $this->id_usuario and id = $id
        ");

    }

    public function __construct($id_usuario){
        $this->conn = new Sql();
        $this->setId_usuario($id_usuario);
    }

}
