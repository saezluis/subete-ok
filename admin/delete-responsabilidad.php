<?php

	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$id_respo = $_REQUEST['id-responsabilidad-send'];
	
	mysqli_query($conexion, "DELETE FROM respo WHERE id_respo='$id_respo'") or die("Problemas en el select:".mysqli_error($conexion));

	echo "Datos Borrados";			

	header('Location: responsabilidad-home.php');
	
?>