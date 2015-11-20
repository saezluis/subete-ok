<?php

	$titulo_seguridad = $_REQUEST['titulo_seguridad'];
	$contenido_seguridad = $_REQUEST['contenido_seguridad'];
	
	include_once 'config.php';
		
		$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
		$acentos = $conexion->query("SET NAMES 'utf8'");
		
	mysqli_query($conexion,"insert into seguridad(titulo_seguridad,contenido_seguridad) values 
									('$titulo_seguridad',
									'$contenido_seguridad'									
									)")
	or die("Problemas con el insert de los servicios");
	
	echo "Contenido guardado..";
	
	echo "<br>";
	
	echo "<a href=\"seguridad-home.php\">Volver</a> ";
	
	//enviar correo de contenido de seguridad agregado
?>