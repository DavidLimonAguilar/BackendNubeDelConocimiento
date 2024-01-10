<?php
  $host_name = 'd';
  $database = 'd';
  $user_name = 'd';
  $password = 'dfdf';
  $dbh = null;

  try {
    $bd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
    //echo"Bien Echo";
     $result = array("conexion" =>"Exitosa");
    $json = json_encode($result);
    //print_r($json);
  } catch (PDOException $e) {
    $array = array("conexion" => "Error de conexion");
    $json = json_encode($array);
   // print_r($json);
  }
?>



