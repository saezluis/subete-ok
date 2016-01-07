<?php

	$titulo_superacion = $_REQUEST['titulo_superacion'];
	$contenido_superacion = $_REQUEST['contenido_superacion'];
	
	include_once 'config.php';
		
		$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
		$acentos = $conexion->query("SET NAMES 'utf8'");
		
	mysqli_query($conexion,"insert into superacion(titulo_superacion,contenido_superacion) values 
									('$titulo_superacion',
									'$contenido_superacion'									
									)")
	or die("Problemas con el insert de los servicios");
	
	echo "Contenido guardado..";
	
	echo "<br>";
	
	echo "<a href=\"superacion-home.php\">Volver</a> ";
	
	//enviar correo de contenido de seguridad agregado
?>