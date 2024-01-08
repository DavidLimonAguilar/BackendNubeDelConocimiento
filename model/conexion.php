<?php
  $host_name = 'db5010409760.hosting-data.io';
  $database = 'dbs8818814';
  $user_name = 'dbu1894736';
  $password = '#Hesoyamcj1234';
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



