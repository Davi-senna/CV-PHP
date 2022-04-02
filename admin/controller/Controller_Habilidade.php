<?php

class Controller_Habilidade{

    private $objectHabilidade;

    public function __construct($id_usuario){
        $this->objectHabilidade = new Habilidade($id_usuario);
    }
    
    public function selectAll(){

       return $this->objectHabilidade->selectAllByUserId();

    }

    //Método para gerar array com instancias dos valores existentes 
    public function getInstances(){
        $results = $this->selectAll();
        $instances = array();

        foreach($results as $array){
            $object = new Habilidade($array["id_usuario"]);
            $object->pullFeedClass($array["id"]);
            array_push($instances, $object);
        }

        return $instances;
    }

    public function deleteHabilidade($id){
        
        $this->objectHabilidade->delete($id);

    }

    public function addHabilidade($user_data){
        extract($user_data);
        
        $this->objectHabilidade->pushInsert($nome_habilidade,$nivel_habilidade);
    }
}
