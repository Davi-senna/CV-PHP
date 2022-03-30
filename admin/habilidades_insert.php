<?php

var_dump($_GET);
extract($_GET);

require_once("../Sql.php");

$sql = new Sql();

try{

    $sql->execQuery("INSERT INTO habilidades(id_usuario,nome_habilidade,nivel_habilidade) 
        Values (
            1,
            '$nome_habilidade',
            '$nivel_habilidade'
        )
    ");

    header("Location: habilidades.php");
    
}catch(Exception $e){
    header("Location: habilidades.php?Error=teste");
}