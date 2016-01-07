<?php

	$id_produ = $_REQUEST['id-productividad-send'];
	$titulo_produ = $_REQUEST['titulo-productividad-send'];
	$contenido_produ = $_REQUEST['contenido-productividad-send'];
	
	echo "id_seguridad: ".$id_seguridad;
	echo "<br>";
	echo "contenido seguridad: ".$contenido_seguridad;
	echo "<br>";
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
		
		
		mysqli_query($conexion, "update produ	
									set titulo_produ='$titulo_produ',
								    contenido_produ='$contenido_produ'
									WHERE id_produ='$id_produ'") or
									die("Problemas en el select:".mysqli_error($conexion));

	//echo "Datos Actualizados";			
	
	header('Location: productividad-home.php');
	
?>