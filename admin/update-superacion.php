<?php

	$id_superacion = $_REQUEST['id-superacion-send'];
	$titulo_superacion = $_REQUEST['titulo-superacion-send'];
	$contenido_superacion = $_REQUEST['contenido-superacion-send'];
	
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
		
		
		mysqli_query($conexion, "update superacion	
									set titulo_superacion='$titulo_superacion',
								    contenido_superacion='$contenido_superacion'
									WHERE id_superacion='$id_superacion'") or
									die("Problemas en el select:".mysqli_error($conexion));

	//echo "Datos Actualizados";			
	
	header('Location: superacion-home.php');
	
?>