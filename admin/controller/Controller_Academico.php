<?php

class Controller_Academico{

    private $objectAcademico;

    public function __construct($id_usuario){
        $this->objectAcademico = new Academico($id_usuario);
    }
    
    public function selectAll(){

       return $this->objectAcademico->selectAllByUserId();

    }

    //Método para gerar array com instancias dos valores existentes 
    public function getInstances(){
        $results = $this->selectAll();
        $instances = array();

        foreach($results as $array){
            $object = new Academico($array["id_usuario"]);
            $object->pullFeedClass($array["id"]);
            array_push($instances, $object);
        }

        return $instances;
    }

    public function deleteAcademico($id){
        
        $this->objectAcademico->delete($id);

    }
}



/*
$teste = new Controller_Academico(1);
//var_dump($teste->selectAll());
//var_dump($teste->getInstances());
echo "<br><br>";
$instances = $teste->deleteAcademico(22);
//var_dump($instances[0]);
echo "<br><br>";
$instance = $instances[0];
$instance->pullFeedClass(19);
var_dump($instances[0]->getNivel());
*/

/*
$teste2 = new Academico(1);
$teste2->pushFeedClass("teste","teste","teste","teste","teste","teste");
$teste2->pushInsert();
*/

/*
$teste3 = new Academico(1);
$teste3->pullFeedClass(21);
var_dump($teste3->getId());
$teste3->pushUpdate("tdoaaa","test","test","test","test","test");
*/

/*
$teste4 = new Academico(1);
$teste4->pullFeedClass(21);
var_dump($teste4->getId());
$teste4->delete();
*/