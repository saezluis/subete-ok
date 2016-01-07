<?php

	$id_opti = $_REQUEST['id-optimismo-send'];
	$titulo_opti = $_REQUEST['titulo-optimismo-send'];
	$contenido_opti = $_REQUEST['contenido-optimismo-send'];
	
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
		
		
		mysqli_query($conexion, "update optimismo	
									set titulo_opti='$titulo_opti',
								    contenido_opti='$contenido_opti'
									WHERE id_opti='$id_opti'") or
									die("Problemas en el select:".mysqli_error($conexion));

	//echo "Datos Actualizados";			
	
	header('Location: optimismo-home.php');
	
?>