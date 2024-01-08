<?php

include 'model/conexion.php';
//$codigo = "1924006";
$codigo = $_POST['clave'];

$sentencia = $bd->query("SELECT * FROM alumnos Where numeroControl = $codigo");
$alumnos = $sentencia->fetchAll(PDO::FETCH_OBJ);
$numRows = count($alumnos);

if($numRows > 0){
    $sentencia = $bd->prepare("DELETE FROM alumnos WHERE numeroControl = ?;");
    $resultado = $sentencia->execute([$codigo]);

    if (!$resultado) {
       $result = array("msj" =>"Error");
       $json = json_encode($result);
        $print_r($json);
    }else{
        $result = array("msj" =>"Exito");
       $json = json_encode($result);
      print_r($json);
    }
} else {
    $result = array("msj" =>"Inexistente");
       $json = json_encode($result);
     print_r($json);
}


?>