<?php

var_dump($_POST);
extract($_POST);

require_once("../Sql.php");

$sql = new Sql();

try{

    $sql->execQuery("INSERT INTO academico(id_usuario,experiencia,instituicao,nivel,data_inicio,data_termino,descricao) 
        Values (
            1,
            '$nome_experiencia',
            '$instituicao',
            '$nivel',
            '$data_inicio',
            '$data_termino',
            '$descricao'

        )
    ");

    header("Location: academico.php");
    
}catch(Exception $e){
    header("Location: academico.php?Error=teste");
}