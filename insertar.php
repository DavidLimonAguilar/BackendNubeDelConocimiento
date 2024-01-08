<?php
include 'model/conexion.php';

$nControl = ($_POST['nControl']);
$nombre = ($_POST['txtNombre']);
$aP = ($_POST['txtPaterno']);
$aM = ($_POST['txtMaterno']);
$grado = ($_POST['txtGrado']);
$grupo = ($_POST['txtGrupo']);
$email = ($_POST['txtEmail']);
$pass = ($_POST['txtContra']);
$apodo = ($_POST['apodo']);
/*
$nControl = "19240099";
$nombre = "Cris";
$aP = "Bolaños";
$aM = "Cordoba";
$grado = "3";
$grupo = "A";
$email = "cris@gmail.com";
$pass = "1234";
$apodo = "NATA";
*/

try {
    if ($nControl == "" || $nombre == "" || $aP == "" || $aM == "" || $grado == "" || $grupo == "" || $email == "" || $pass == "") {
        $result = array("msj" => "campos vacios");
        $json = json_encode($result);
        print_r($json);
    } else {
        $sentencia = $bd->prepare("INSERT INTO alumnos VALUES (?,?,?,?,?,?,?,?)");
        $resultado = $sentencia->execute([$nControl, $nombre, $aP, $aM, $grado, $grupo, $email, $pass]);



        if ($resultado === TRUE) {

            $ap = $bd->prepare("INSERT INTO idjugador(numeroControl, apodo) values (?,?) ");
            $jugadorR = $ap->execute([$nControl,$apodo]);

            $result = array("msj" => "Exito");
            $json = json_encode($result);
            print_r($json);

        } else {
            $result = array("msj" => "Error");
            $json = json_encode($result);
            print_r($json);
        }
    }
} catch (Exception $e) {
    $error = array("exception" => "Id existente");
    //echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    $jsoError = json_encode($error);
    print_r($jsoError);
}

?>