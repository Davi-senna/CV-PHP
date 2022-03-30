<?php

require_once("../Sql.php");


$stmt = new Sql();
$results = $stmt->select("SELECT * FROM cv.experiencia WHERE id_usuario = 1");
?>