<?php
	
	
	//necesito recibir aqui el id del que voy a colocar activo
	
	$estatus = $_GET['estatus'];
	//activo1
	$estatusPart = substr($estatus,0,6);
	$id_profe = substr($estatus,6,7);
	
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	mysqli_query($conexion, "update profesionalismo set estatus='$estatusPart' where id_profe = '$id_profe'") or
									die("Problemas en el select:".mysqli_error($conexion));
	
	mysqli_query($conexion, "update profesionalismo set estatus='inactivo' where id_profe != '$id_profe'") or
									die("Problemas en el select:".mysqli_error($conexion));
									
	//echo "ejecuto en teoria el cambio";
	header('Location: profesionalismo-home.php');
	
?>