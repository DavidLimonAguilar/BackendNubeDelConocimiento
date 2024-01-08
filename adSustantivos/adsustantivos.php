<?php

include_once '../model/conexion.php';
$sql = $bd->query("SELECT * FROM adjetivossustantivos;");
$sustantivos = $sql->fetchAll(PDO::FETCH_OBJ);

$dataS = json_encode($sustantivos);
echo($dataS);
