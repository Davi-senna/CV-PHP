<?php

require_once("../Sql.php");
extract($_POST);

$dir = "uploads/";
$file = $_FILES["image"];
$upload_file = $dir . md5(rand() .date("d-m-Y H:i:s")). $file["name"];

try{

$sql = new Sql();
$sql->execQuery("INSERT INTO imagens_portfolio(nome,image_source,link,id_usuario)
VALUES(
    '$nome_projeto',
    '$upload_file',
    '$link_projeto',
    1
)");

var_dump($upload_file);

if(!is_dir($dir)){
    mkdir($dir);
}

if(move_uploaded_file($file["tmp_name"],$upload_file)){
echo "foi";
}

header('Location: portfolio.php?sucess=Usuario atualizado com sucesso');
}catch(Exception $e){
    header("Location: portfolio.php?Error=Imagem não inserida");
}


?>