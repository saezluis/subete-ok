<?php

	$id_seguridad = $_REQUEST['id-seguridad-send'];
	$titulo_seguridad = $_REQUEST['titulo-seguridad-send'];
	$contenido_seguridad = $_REQUEST['contenido-seguridad-send'];
	
	echo "id_seguridad: ".$id_seguridad;
	echo "<br>";
	echo "contenido seguridad: ".$contenido_seguridad;
	echo "<br>";
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
		
		
		mysqli_query($conexion, "update seguridad	
									set titulo_seguridad='$titulo_seguridad',
								    contenido_seguridad='$contenido_seguridad'
									WHERE id_seguridad='$id_seguridad'") or
									die("Problemas en el select:".mysqli_error($conexion));

	//echo "Datos Actualizados";			
	
	header('Location: seguridad-home.php');
	
?>