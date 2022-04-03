<?php

class Controller_Sobre{

    private $objectSobre;

    public function __construct($id_usuario){
        $this->objectSobre = new Sobre($id_usuario);
    }

    public function selectAll(){

        return $this->objectSobre->selectAllByUserId();
    }


    public function deleteSobre($id){

        $this->objectSobre->delete($id);
        
    }

    public function addSobre($user_data){
        extract($user_data);

        $this->objectSobre->pushInsert($idade, $email, $telefone, $numero, $rua, $cidade, $estado, $pais, $conteudo);


    }

    public function updateSobre($user_data){
        extract($user_data);

        $this->objectSobre->pushUpdate($idade, $email, $telefone, $numero, $rua, $cidade, $estado, $pais, $conteudo);

    }
}
