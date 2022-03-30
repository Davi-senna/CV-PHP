<?php

require_once("../Sql.php");


$stmt = new Sql();
$results = $stmt->select("SELECT * FROM cv.sobre WHERE id = 1");
$about = $results[0];
extract($about);

?>