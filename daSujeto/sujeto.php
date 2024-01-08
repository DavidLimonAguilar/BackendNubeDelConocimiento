<?php

include_once '../model/conexion.php';
$sql = $bd->query("SELECT * FROM sujeto;");
$sujeto = $sql->fetchAll(PDO::FETCH_OBJ);

$dataSujeto = json_encode($sujeto);
print_r($dataSujeto);
