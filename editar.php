<?php
include 'model/conexion.php';

$id = (!empty($_POST['id'])) ? $_POST['id'] : "";
$nombre = (!empty($_POST['nombre'])) ? $_POST['nombre'] : "";
$aP = (!empty($_POST['aPaterno'])) ? $_POST['aPaterno'] : "";
$aM = (!empty($_POST['aMaterno'])) ? $_POST['aMaterno'] : "";
$grado =(!empty($_POST['grado'])) ? $_POST['grado'] : "";
$grupo = (!empty($_POST['grupo'])) ? $_POST['grupo'] : "";
$email = (!empty($_POST['correo'])) ? $_POST['correo'] : "";
$contra = (!empty($_POST['password'])) ? $_POST['password'] : "";

if ($id == "" || $nombre == "" || $aP == "" || $aM == "" || $grado == "" || $grupo == "" || $email == "" || $contra == "") {
     $result = array("msj" =>"campos 0");
       $json = json_encode($result);
      print_r($json);
} else {

    $sentencia = $bd->prepare("UPDATE alumnos SET nombre = ?, aPaterno = ?, aMaterno = ?, grado = ?, grupo = ?, correo = ?, password = ?
		WHERE numeroControl = ?;");
    $resultado = $sentencia->execute([$nombre, $aP, $aM, $grado, $grupo, $email, $contra, $id]);

    if (!$resultado) {
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
