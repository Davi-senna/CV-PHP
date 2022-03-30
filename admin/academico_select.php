<?php

require_once("../Sql.php");


$stmt = new Sql();
$results = $stmt->select("SELECT * FROM cv.academico WHERE id_usuario = 1");
?>