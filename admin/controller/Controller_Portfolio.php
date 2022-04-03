<?php

class Controller_Portfolio{

    private $objectPortfolio;

    public function __construct($id_usuario){
        $this->objectPortfolio = new Portfolio($id_usuario);
    }

    public function selectAll(){

        return $this->objectPortfolio->selectAllByUserId();
    }

    //Método para gerar array com instancias dos valores existentes 
    public function getInstances(){
        $results = $this->selectAll();
        $instances = array();

        foreach ($results as $array) {
            $object = new Portfolio($array["id_usuario"]);
            $object->pullFeedClass($array["id"]);
            array_push($instances, $object);
        }

        return $instances;
    }

    public function deletePortfolio($id){
        $file = $this->objectPortfolio->selectSpecific($id);
        $this->objectPortfolio->delete($id);
        $nameFile =  $file["image_source"];
        unlink($nameFile);
        

    }

    public function addPortfolio($user_data, $image){
        extract($user_data);

        $dir = "images/";
        $file = $image["image"];
        $image_source = $dir . md5(rand() . date("d-m-Y H:i:s")) . $file["name"];

        $this->objectPortfolio->pushInsert($nome, $image_source, $link);

        if(!is_dir($dir)){
            mkdir($dir);
        }

        if(move_uploaded_file($file["tmp_name"],$image_source)){
            return 1;
        }else{
            return 0;
        };


    }
}
