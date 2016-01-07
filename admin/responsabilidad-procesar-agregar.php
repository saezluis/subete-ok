<?php

	$titulo_respo = $_REQUEST['titulo_respo'];
	$contenido_respo = $_REQUEST['contenido_respo'];
	
	include_once 'config.php';
		
		$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
		$acentos = $conexion->query("SET NAMES 'utf8'");
		
	mysqli_query($conexion,"insert into respo(titulo_respo,contenido_respo) values 
									('$titulo_respo',
									'$contenido_respo'									
									)")
	or die("Problemas con el insert de los servicios");
	
	echo "Contenido guardado..";
	
	echo "<br>";
	
	echo "<a href=\"responsabilidad-home.php\">Volver</a> ";
	
	//enviar correo de contenido de seguridad agregado
?>