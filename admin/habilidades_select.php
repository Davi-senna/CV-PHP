<?php

require_once("../Sql.php");


$stmt = new Sql();
$results = $stmt->select("SELECT * FROM cv.habilidades WHERE id_usuario = 1");

?>