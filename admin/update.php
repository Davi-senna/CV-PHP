<?php

require_once("../Sql.php");

extract($_POST);

if (isset($situacao)) {
    $situacao = 1;
} else {
    $situacao = 0;
}

$stmt = new Sql();
try {

    $stmt->execQuery("UPDATE cv.cv_usuario
SET
usu_nome = '$name',
usu_email = '$email',
usu_login = '$user',
usu_senha = md5('$password'),
usu_status = $situacao

WHERE usu_id_usuario = $id");

    header('Location: usuario.php?sucess=Usuario atualizado com sucesso');
} catch (Exception $e) {
    header("Location: usuario_form.php?Error=teste");
}

$stmt->disconnect();
