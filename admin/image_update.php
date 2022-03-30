<?php

$dir = "uploads/";
$file = $_FILES["image"];
$upload_file = $dir . rand() .date("d-m-Y H:i:s"). $file["name"];
echo $upload_file;
/*var_dump($upload_file);

if(!is_dir($dir)){
    mkdir($dir);
}

if(move_uploaded_file($file["tmp_name"],$upload_file)){
echo "foi";
}

*/


?>