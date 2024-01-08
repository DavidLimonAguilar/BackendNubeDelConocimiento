 <?php


		include 'model/conexion.php';
		$sentencia = $bd->query("SELECT numeroControl,nombre, password FROM alumnos;");
		$alumnos = $sentencia->fetchAll(PDO::FETCH_OBJ);
		//print_r($alumnos);
       $dataAlumnos = json_encode($alumnos);
       print_r($dataAlumnos);
?>
