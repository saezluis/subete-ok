<?php

	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$rut = $_REQUEST['rut-send'];
		
	mysqli_query($conexion, "DELETE FROM cuenta WHERE rut='$rut'") or die("Problemas en el select:".mysqli_error($conexion));

	echo "Datos Borrados";			

	//header('Location: eliminar-usuario.php');
	
?>