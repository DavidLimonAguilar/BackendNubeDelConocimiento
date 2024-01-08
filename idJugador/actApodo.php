<?php

include '../model/conexion.php';

$recibe = file_get_contents('php://input');
$deco = json_decode($recibe,true);

$nControl = ($deco['nControl']);
$ap = ($deco['apodo']);

if ($ap == "" || $nControl == "") {
     $result = array("msj" =>"campos necesario");
       $json = json_encode($result);
      print_r($json);
} else {

    $sentencia = $bd->prepare("UPDATE idjugador SET apodo = ? WHERE numeroControl = ?;");
    $resApodo = $sentencia->execute([$ap,$nControl]);

    if (!$resApodo) {
        $result = array("msj" =>"Error");
       $json = json_encode($result);
      print_r($json);
    } else {
        $result = array("msj" =>"Exito");
       $json = json_encode($result);
      print_r($json);
    }

}

?>