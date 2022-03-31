<?php

class Controller_Academico{

    private $instanceModel;

    public function __construct($id_usuario){
        $this->instanceModel = new Usuario($id_usuario);
    }
    
    public function selectAll(){

        $results = $this->instanceModel->selectAllByUserId();
        return $results;
    }

    public function comfirmUser($_GET){
        extract($_GET);
        $results = $this->instanceModel->validUser($login,$senha);
        return $results;

    }
    
    public function addUser($_GET){
        extract($_GET);
        $this->instanceModel->pushInsert($nome,$email,$senha,$login,$status);
    }
}
