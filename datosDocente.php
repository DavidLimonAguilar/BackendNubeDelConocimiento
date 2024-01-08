<?php

include_once 'model/conexion.php';

$sentencia = $bd->query("SELECT * FROM docente");
$alumnos = $sentencia->fetchAll(PDO::FETCH_OBJ);

$datoDocente = json_encode($alumnos);
print_r($datoDocente);

?>