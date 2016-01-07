<?php

	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$id_produ = $_REQUEST['id-productividad-send'];
	
	echo "id: ".$id_produ;
	echo "<br>";
		
	mysqli_query($conexion, "DELETE FROM produ WHERE id_produ='$id_produ'") or die("Problemas en el select:".mysqli_error($conexion));

	echo "Datos Borrados";			

	header('Location: productividad-home.php');
	
?>