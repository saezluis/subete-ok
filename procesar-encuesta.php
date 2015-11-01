<?php
		
		include_once 'config.php';
		
		$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
		$acentos = $conexion->query("SET NAMES 'utf8'");
		
		//$pregunta1_si = @$_REQUEST['radioRockSi'];
		//$pregunta1_no = @$_REQUEST['radioRockNo'];
		
		if(@$_REQUEST['radioRockSi'] != ''){
			$pregunta1 = @$_REQUEST['radioRockSi'];
		}else{
			$pregunta1 = @$_REQUEST['radioRockNo'];
		}
		
		if(@$_REQUEST['radioPopSi'] != ''){
			$pregunta2 = @$_REQUEST['radioPopSi'];
		}else{
			$pregunta2 = @$_REQUEST['radioPopNo'];
		}
		
		if(@$_REQUEST['radioCumbiaSi'] != ''){
			$pregunta3 = @$_REQUEST['radioCumbiaSi'];
		}else{
			$pregunta3 = @$_REQUEST['radioCumbiaNo'];
		}
		
		if(@$_REQUEST['radioBaladaSi'] != ''){
			$pregunta4 = @$_REQUEST['radioBaladaSi'];
		}else{
			$pregunta4 = @$_REQUEST['radioBaladaNo'];
		}
		
		if(@$_REQUEST['radioJazzSi'] != ''){
			$pregunta5 = @$_REQUEST['radioJazzSi'];
		}else{
			$pregunta5 = @$_REQUEST['radioJazzNo'];
		}
		
		echo "respuesta 1: ".$pregunta1;
		echo "<br>";
		echo "respuesta 2: ".$pregunta2;
		echo "<br>";
		echo "respuesta 3: ".$pregunta3;
		echo "<br>";
		echo "respuesta 4: ".$pregunta4;
		echo "<br>";
		echo "respuesta 5: ".$pregunta5;
		
?>