<?php

	$nombre_noticia = $_REQUEST['nombre_noticia'];
	$contenido = $_REQUEST['contenido'];
	
	include_once 'config.php';
		
		$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
		$acentos = $conexion->query("SET NAMES 'utf8'");
		
	mysqli_query($conexion,"insert into noticias(nombre_noticia,contenido) values 
									('$nombre_noticia',
									'$contenido'									
									)")
	or die("Problemas con el insert de los servicios");
	
	echo "Contenido guardado..";
	
	echo "<br>";
	
	echo "<a href=\"index.html\">Volver</a> ";
	
	//enviar correo de contenido de seguridad agregado
?>