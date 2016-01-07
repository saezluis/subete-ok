<?php

	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$id_noticias = $_REQUEST['id-noticias-send'];
		
	mysqli_query($conexion, "DELETE FROM noticias WHERE id_noticias='$id_noticias'") or die("Problemas en el select:".mysqli_error($conexion));

	echo "Datos Borrados";			

	header('Location: index.html');
	
?>