<?php

	$titulo_productividad = $_REQUEST['titulo_productividad'];
	$contenido_productividad = $_REQUEST['contenido_productividad'];
	
	include_once 'config.php';
		
		$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
		$acentos = $conexion->query("SET NAMES 'utf8'");
		
	mysqli_query($conexion,"insert into produ(titulo_produ,contenido_produ) values 
									('$titulo_productividad',
									'$contenido_productividad'									
									)")
	or die("Problemas con el insert de los servicios");
	
	echo "Contenido guardado..";
	
	echo "<br>";
	
	echo "<a href=\"productividad-home.php\">Volver</a> ";
	
	//enviar correo de contenido de seguridad agregado
?>