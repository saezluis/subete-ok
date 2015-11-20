<?php

	$rut = $_REQUEST['rut-send'];
	$nombre = $_REQUEST['nombre-send'];
	$apellido_paterno = $_REQUEST['apellido-paterno-send'];
	$apellido_materno = $_REQUEST['apellido-materno-send'];
	$sexo = $_REQUEST['sexo-send'];
	$fecha_nacimiento = $_REQUEST['fecha-nacimiento-send'];
	$hash = $_REQUEST['hash-send'];
	$pass = $_REQUEST['password-send'];
	$telefono = $_REQUEST['telefono-send'];
	$comuna = $_REQUEST['comuna-send'];	
	$email = $_REQUEST['email-send'];	
	$temas_interes = $_REQUEST['temas-interes-send'];
	$foto_perfil = $_REQUEST['foto-send'];


	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
		
		mysqli_query($conexion, "update cuenta
								set nombre='$nombre',
								    apellido_paterno='$apellido_paterno',
									apellido_materno='$apellido_materno',
									sexo='$sexo',
									fecha_nacimiento='$fecha_nacimiento',
									rut='$rut',
									hash='$hash',
									telefono='$telefono',
									comuna_residencia='$comuna',
									email='$email',
									password='$pass',
									temas_interes='$temas_interes',
									foto_perfil='$foto_perfil'
									where rut='$rut'") or
									die("Problemas en el select:".mysqli_error($conexion));

	echo "Datos Actualizados";			

	header('Location: editar-usuario.php');
	
?>