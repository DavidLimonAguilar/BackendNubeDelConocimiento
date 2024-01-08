<?php

include '../model/conexion.php';
$recibe = file_get_contents('php://input');
$deco = json_decode($recibe,true);
$nControl = ($deco['nControl']);

$ap = $bd->prepare("SELECT apodo FROM idjugador WHERE numeroControl = ?;");
$ap->execute([$nControl]);
$jugadorApodo = $ap->fetchAll(PDO::FETCH_OBJ);



if (!$jugadorApodo) {
    echo "Datos no ecnontrados";
}

$json = json_encode($jugadorApodo);
print_r($json);

?>
