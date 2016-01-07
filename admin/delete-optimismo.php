<?php

	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$id_opti = $_REQUEST['id-optimismo-send'];
	
	mysqli_query($conexion, "DELETE FROM optimismo WHERE id_opti='$id_opti'") or die("Problemas en el select:".mysqli_error($conexion));

	echo "Datos Borrados";			

	header('Location: optimismo-home.php');
	
?>