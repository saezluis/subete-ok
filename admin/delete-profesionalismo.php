<?php

	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$id_profe = $_REQUEST['id-profesionalismo-send'];
	
	mysqli_query($conexion, "DELETE FROM profesionalismo WHERE id_profe='$id_profe'") or die("Problemas en el select:".mysqli_error($conexion));

	echo "Datos Borrados";			

	header('Location: profesionalismo-home.php');
	
?>