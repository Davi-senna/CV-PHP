<?php

require_once("../Sql.php");

extract($_POST);


$stmt = new Sql();


$stmt->execQuery("UPDATE cv.sobre
SET
idade = $idade,
email = '$email',
numero = $numeroCasa,
rua = '$rua',
cidade = '$cidade',
estado = '$estado',
pais = '$pais',
telefone = '$telefone',
conteudo = '$conteudo',
id_usuario = 1
WHERE id = 1");


$stmt->disconnect();
header("Location: about.php");
