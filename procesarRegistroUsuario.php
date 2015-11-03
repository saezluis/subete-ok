<?php
	
	//Aqui recibo los datos del formulario anterior
	$rut = '19447431';
	//genero clave hash a partir del rut entregado		
	//$hash = md5($rut);
	
	$hash = md5("45!$32d".$rut);
	
	echo "clave hash: ".$hash;
	//Cargo los datos del usuario
	$email = 'prueba@prueba.cl';
	$nombre = 'Prueba Primera';
	
	
	$ch = curl_init();                   
	
	$url = "http://royal.peoplecare.cl/autoregister/$rut/$hash"; 
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_POST, true);  
	curl_setopt($ch, CURLOPT_POSTFIELDS, "email=$email&nombre=$nombre&rut=$rut"); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	$output = curl_exec ($ch); 	 
	curl_close ($ch); 	
	//Solo a manera de prueba muestro la salida
	var_dump($output); 
	
?>