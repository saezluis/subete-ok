<?php
  session_start();
  
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administrador Súbete - 1.0</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
		

  </head>
  <body>
	<?php
		
	include_once 'config.php';
		
		$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
		$acentos = $conexion->query("SET NAMES 'utf8'");

		$registrosSuperacion=mysqli_query($conexion,"select * from superacion") or die("Problemas en el select:".mysqli_error($conexion));
		
		
		
	?>
	<div>	
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center">
					<a href="index.html">Administrador Súbete</a>
				</h3>
			</div>			
		</div>
		
			<div class="row">
				<div class="col-md-10">
					<h3 class="text-left">
					<?php
						echo "<a href=\"index.html\">Inicio</a> - <a href=\"superacion-home.php\">Pilar: Superacion</a> - Eliminar contenido";
					?>						
					</h3>
					<br>					
						<?php
						while($reg=mysqli_fetch_array($registrosSuperacion)){
							$id_superacion = $reg['id_superacion'];
							$titulo_superacion = $reg['titulo_superacion'];
							//$contenido_seguridad = $reg['contenido_seguridad'];
							
							echo "<li>Titulo contenido: <a href=\"elim-superacion.php?id_send=",urlencode($id_superacion)," \">$titulo_superacion</a> </li>";
							echo "<br>";

						}
						?>						
				</div>
			</div>
		</div>
	</div>
	
		
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
	
  </body>
</html>