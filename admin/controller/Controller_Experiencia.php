<?php

class Controller_Experiencia{

    private $objectExperiencia;

    public function __construct($id_usuario){
        $this->objectExperiencia = new Experiencia($id_usuario);
    }
    
    public function selectAll(){

       return $this->objectExperiencia->selectAllByUserId();

    }

    //Método para gerar array com instancias dos valores existentes 
    public function getInstances(){
        $results = $this->selectAll();
        $instances = array();

        foreach($results as $array){
            $object = new Experiencia($array["id_usuario"]);
            $object->pullFeedClass($array["id"]);
            array_push($instances, $object);
        }

        return $instances;
    }

    public function deleteExperiencia($id){
        
        $this->objectExperiencia->delete($id);

    }

    public function addExperiencia($user_data){
        extract($user_data);
        
        $this->objectExperiencia->pushInsert($area, $profissao, $data_inicio, $data_termino, $descricao);
    }
}

