<?php

var_dump($_GET);
extract($_GET);

require_once("../Sql.php");

$sql = new Sql();

    $sql->execQuery(" DELETE from cv.habilidades where id_usuario = 1 and id = $id
    ");

header('Location: habilidades.php?sucess=Usuario deletado com sucesso');
