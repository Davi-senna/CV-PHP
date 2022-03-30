<?php

require_once("../Sql.php");


$stmt = new Sql();
$results = $stmt->select("SELECT * FROM cv.cv_usuario WHERE usu_id_usuario = $id");
$usuario = $results[0];

?>