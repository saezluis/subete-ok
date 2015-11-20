<?php
	
	
	//necesito recibir aqui el id del que voy a colocar activo
	
	$estatus = $_GET['estatus'];
	//activo1
	$estatusPart = substr($estatus,0,6);
	$id_seguridad = substr($estatus,6,7);
	
	echo "Estatus: ".$estatusPart;
	echo "<br>";
	echo "Id seguridad: ".$id_seguridad;
	echo "<br>";
	//echo substr("Hello world",10)."<br>"; //agarra la d
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	mysqli_query($conexion, "update seguridad set estatus='$estatusPart' where id_seguridad = '$id_seguridad'") or
									die("Problemas en el select:".mysqli_error($conexion));
	
	mysqli_query($conexion, "update seguridad set estatus='inactivo' where id_seguridad != '$id_seguridad'") or
									die("Problemas en el select:".mysqli_error($conexion));
									
	//echo "ejecuto en teoria el cambio";
	header('Location: seguridad-home.php');
	
?>