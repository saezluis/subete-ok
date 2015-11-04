<?php
	
	//Aqui recibo los datos del formulario anterior
	//$rut = '19447431';
	//RUT correspondería al número, sin puntos, comas ni comas y sin dígito verificador
	
	//genero clave hash a partir del rut entregado		
	//$hash = md5($rut);
	
	//echo "clave hash: ".$hash;
	//Cargo los datos del usuario
	
	$nombre = $_REQUEST['nombre'];
	$apellido_paterno = $_REQUEST['apellido_paterno'];
	$apellido_materno = $_REQUEST['apellido_materno'];
	$sexo = $_REQUEST['sexo'];
	$fecha_nacimiento = $_REQUEST['fecha_nacimiento'];
	$rut = $_REQUEST['rut'];
	$pass = $_REQUEST['pass'];
	$telefono = $_REQUEST['telefono'];
	$comuna = $_REQUEST['comuna'];
	$email = $_REQUEST['email'];
	$temas_interes = $_REQUEST['temas_interes'];
	
	$hash = md5("45!$32d".$rut);
	
	include_once 'config.php';
		
	$newDate = date("Y-m-d", strtotime($fecha_nacimiento));		
		
		$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
		$acentos = $conexion->query("SET NAMES 'utf8'");
		
		mysqli_query($conexion, "update cuenta
								set nombre='$nombre',
								    apellido_paterno='$apellido_paterno',
									apellido_materno='$apellido_materno',
									sexo='$sexo',
									fecha_nacimiento='$newDate',
									rut='$rut',
									hash='$hash',
									telefono='$telefono',
									comuna_residencia='$comuna',
									email='$email',
									password='$pass',
									temas_interes='$temas_interes'								
									where rut='$rut'") or
									die("Problemas en el select:".mysqli_error($conexion));

	echo "Datos Actualizados";									
?>