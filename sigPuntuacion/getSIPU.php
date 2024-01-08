<?php
include_once '../model/conexion.php';
$sql = $bd->query("SELECT * FROM signospuntuacion;");
$signosPuntuacion = $sql->fetchAll(PDO::FETCH_OBJ);

$dataSP = json_encode($signosPuntuacion);
print_r($dataSP);
