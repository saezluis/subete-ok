<?php

	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$id_superacion = $_REQUEST['id-superacion-send'];
	
	mysqli_query($conexion, "DELETE FROM superacion WHERE id_superacion='$id_superacion'") or die("Problemas en el select:".mysqli_error($conexion));

	echo "Datos Borrados";			

	header('Location: superacion-home.php');
	
?>