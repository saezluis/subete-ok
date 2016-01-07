<?php

	$titulo_profe = $_REQUEST['titulo_profe'];
	$contenido_profe = $_REQUEST['contenido_profe'];
	
	include_once 'config.php';
		
		$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
		$acentos = $conexion->query("SET NAMES 'utf8'");
		
	mysqli_query($conexion,"insert into profesionalismo(titulo_profe,contenido_profe) values 
									('$titulo_profe',
									'$contenido_profe'									
									)")
	or die("Problemas con el insert de los servicios");
	
	echo "Contenido guardado..";
	
	echo "<br>";
	
	echo "<a href=\"profesionalismo-home.php\">Volver</a> ";
	
	//enviar correo de contenido de seguridad agregado
?>