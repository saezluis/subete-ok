<?php

	$titulo_opti = $_REQUEST['titulo_opti'];
	$contenido_opti = $_REQUEST['contenido_opti'];
	
	include_once 'config.php';
		
		$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
		$acentos = $conexion->query("SET NAMES 'utf8'");
		
	mysqli_query($conexion,"insert into optimismo(titulo_opti,contenido_opti) values 
									('$titulo_opti',
									'$contenido_opti'									
									)")
	or die("Problemas con el insert de los servicios");
	
	echo "Contenido guardado..";
	
	echo "<br>";
	
	echo "<a href=\"optimismo-home.php\">Volver</a> ";
	
	//enviar correo de contenido de seguridad agregado
?>