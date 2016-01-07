<?php

	$id_respo = $_REQUEST['id-responsabilidad-send'];
	$titulo_respo = $_REQUEST['titulo-responsabilidad-send'];
	$contenido_respo = $_REQUEST['contenido-responsabilidad-send'];
	
	echo "id_seguridad: ".$id_respo;
	echo "<br>";
	echo "contenido seguridad: ".$contenido_respo;
	echo "<br>";
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
		
		
		mysqli_query($conexion, "update respo	
									set titulo_respo='$titulo_respo',
								    contenido_respo='$contenido_respo'
									WHERE id_respo='$id_respo'") or
									die("Problemas en el select:".mysqli_error($conexion));

	//echo "Datos Actualizados";			
	
	header('Location: responsabilidad-home.php');
	
?>