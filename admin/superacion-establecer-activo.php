<?php
	
	
	//necesito recibir aqui el id del que voy a colocar activo
	
	$estatus = $_GET['estatus'];
	//activo1
	$estatusPart = substr($estatus,0,6);
	$id_superacion = substr($estatus,6,7);
	
	echo "Estatus: ".$estatusPart;
	echo "<br>";
	echo "Id respo: ".$id_respo;
	echo "<br>";
	//echo substr("Hello world",10)."<br>"; //agarra la d
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	mysqli_query($conexion, "update superacion set estatus='$estatusPart' where id_superacion = '$id_superacion'") or
									die("Problemas en el select:".mysqli_error($conexion));
	
	mysqli_query($conexion, "update superacion set estatus='inactivo' where id_superacion != '$id_superacion'") or
									die("Problemas en el select:".mysqli_error($conexion));
									
	//echo "ejecuto en teoria el cambio";
	header('Location: superacion-home.php');
	
?>