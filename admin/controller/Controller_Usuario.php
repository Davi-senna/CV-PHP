<?php

class Controller_Usuario{

    private $instanceModel;

    public function __construct($id_usuario = "Em processo de criação"){
        $this->instanceModel = new Usuario($id_usuario);
    }
    
    public function selectAll(){

        $results = $this->instanceModel->selectAllUser();
        return $results;
    }

    public function comfirmUser($user_data){
        extract($user_data);
        $results = $this->instanceModel->validUser($login,$senha);
        return $results;

    }
    
    public function addUser($user_data){
        extract($user_data);
        $this->instanceModel->pushInsert($nome,$email,$senha,$login,$status);
    }

    public function updateUser($user_data){
        extract($user_data);
        $this->instanceModel->pushUpdate($nome,$email,$senha,$login,$status);
    }

    public function deleteUser($id_usuario){
        $this->instanceModel->delete($id_usuario);
    }
}
