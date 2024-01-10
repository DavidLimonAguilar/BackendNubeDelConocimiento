<?php
include_once 'model/conexion.php';
//$usuario = $_POST['usuario'];
//$contrasena = $_POST['contra'];
/* $usuario = "paty@hotmail.com";
$contrasena = "123"; */


$sentencia = $bd->prepare('SELECT * FROM docente WHERE correo = ? AND password = ?;');
$sentencia->execute([$usuario, $contrasena]);
$datos = $sentencia->fetch(PDO::FETCH_OBJ);

if ($datos === FALSE) {
    //header('Location: login.php');
   $result = array("usuario" =>"Error");
    $json2 = json_encode($result);
  print_r($json2);

} else{
   //echo "$datos->nombre";
  $result = array("usuario" =>"Usuario existe");
    $json2 = json_encode($result);
  print_r($json2);
}


?>