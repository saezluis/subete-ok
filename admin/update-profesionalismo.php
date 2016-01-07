<?php

	$id_profe = $_REQUEST['id-profesionalismo-send'];
	$titulo_profe = $_REQUEST['titulo-profesionalismo-send'];
	$contenido_profe = $_REQUEST['contenido-profesionalismo-send'];
	
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
		
		
		mysqli_query($conexion, "update profesionalismo	
									set titulo_profe='$titulo_profe',
								    contenido_profe='$contenido_profe'
									WHERE id_profe='$id_profe'") or
									die("Problemas en el select:".mysqli_error($conexion));

	//echo "Datos Actualizados";			
	
	header('Location: profesionalismo-home.php');
	
?>