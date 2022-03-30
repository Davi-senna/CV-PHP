<?php

require_once("../Sql.php");

extract($_GET);

$stmt = new Sql();
$stmt->execQuery("DELETE FROM cv_usuario WHERE usu_id_usuario = $id");

header('Location: usuario.php?sucess=Usuario deletado com sucesso');

$stmt->disconnect();

?>