<?php
include_once '../model/conexion.php';
//$usuario = "jaime@gmail.com";
//$contrasena = "1234";
$recibe = file_get_contents('php://input');
$deco = json_decode($recibe,true);
$usuario = $deco['correo'];
$contrasena = $deco['password'];

$sentencia = $bd->prepare('select * from alumnos where 
								correo = ? and password = ?;');

$sentencia->execute([$usuario, $contrasena]);
$datos = $sentencia->fetch(PDO::FETCH_OBJ);
//print_r($datos);

if ($datos === FALSE) {
    $result = array("usuario" => "No encontrado");
  //, "correo" => $usuario, "pass" => $contrasena
    $nose = json_encode($result);
    print_r($nose);

} else{

    $result = array("usuario" => "Encontrado");
    $datos1 = json_encode($result);
   // print_r($nose2);
  
    $res = $bd->prepare('SELECT * FROM alumnos WHERE correo = ?;');
    $res->execute([$usuario]);
    $datos2 = $res->fetch(PDO::FETCH_OBJ);

  //$sql = $bd->prepare('SELECT idjugador.apodo, alumnos.numeroControl  FROM idjugador
  $sql = $bd->prepare('SELECT idjugador.apodo  FROM idjugador
  INNER JOIN alumnos ON alumnos.numeroControl = idjugador.numeroControl WHERE correo = ?');
  $sql->execute([$usuario]);
  $apodo = $sql->fetchAll(PDO::FETCH_OBJ);
  //print_r($persona);
  
    $json = array($result, $datos2,$apodo);
    $rall = json_encode($json);
    print_r($rall);
    

}

?>