<?php

	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$id_seguridad = $_REQUEST['id-seguridad-send'];
		
	mysqli_query($conexion, "DELETE FROM seguridad WHERE id_seguridad='$id_seguridad'") or die("Problemas en el select:".mysqli_error($conexion));

	echo "Datos Borrados";			

	header('Location: seguridad-home.php');
	
?>