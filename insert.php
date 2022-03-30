<?php

require_once("Sql.php");

extract($_POST);

if(isset($situacao)){
    $situacao = 1;
}else{
    $situacao = 0;
}

$stmt = new Sql();
try{

$stmt->execQuery("INSERT INTO cv_usuario(usu_nome, usu_email, usu_login, usu_senha, usu_status)

 VALUES(
    '$name','$email','$user',md5('$password'),'$situacao'
)");

header('Location: admin/usuario_form.php?sucess=Usuario inserido com sucesso');

} catch(Exception $e){
    header("Location: admin/usuario_form.php?error=Usuario já existe");
}

$stmt->disconnect();

