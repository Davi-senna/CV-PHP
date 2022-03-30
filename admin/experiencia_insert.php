<?php

var_dump($_POST);
extract($_POST);

require_once("../Sql.php");

$sql = new Sql();

try{

    $sql->execQuery("INSERT INTO experiencia(id_usuario,profissao,area,data_inicio,data_termino,descricao) 
        Values (
            1,
            '$nome_profissao',
            '$nome_area',
            '$data_inicio',
            '$data_termino',
            '$descricao'

        )
    ");

    header("Location: experiencia.php");
    
}catch(Exception $e){
    header("Location: experiencia.php?Error=teste");
}