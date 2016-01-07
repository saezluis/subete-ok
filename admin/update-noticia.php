<?php

	$id_noticias = $_REQUEST['id-noticia-send'];
	$nombre_noticia = $_REQUEST['nombre-noticia-send'];
	$contenido = $_REQUEST['contenido-noticia-send'];
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
		
		
		mysqli_query($conexion, "update noticias	
									set nombre_noticia='$nombre_noticia',
								    contenido='$contenido'
									WHERE id_noticias='$id_noticias'") or
									die("Problemas en el select:".mysqli_error($conexion));

	//echo "Datos Actualizados";			
	
	header('Location: index.html');
	
?>