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
	
	$id_seguridad = $_GET['id_send'];
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$registrosSeguridad=mysqli_query($conexion,"select * from seguridad WHERE id_seguridad='$id_seguridad'") or die("Problemas en el select:".mysqli_error($conexion));
	
	if($reg=mysqli_fetch_array($registrosSeguridad)){
		
		$titulo_seguridad = $reg['titulo_seguridad'];
		$contenido_seguridad = $reg['contenido_seguridad'];
	}
	
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
						echo "<a href=\"index.html\">Inicio</a> - <a href=\"seguridad-home.php\">Pilar: Seguridad</a> - Modificar contenido";
					?>						
					</h3>
					<br>
					<form method="post" action="update-seguridad.php">					
						<?php	
						
						echo "<li>Titulo contenido: <input type=\"text\" name=\"titulo-seguridad-send\" size=\"55\" value=\"$titulo_seguridad\"></li>";	
						
						echo "<input type=\"text\" name=\"id-seguridad-send\" value=\"$id_seguridad\" hidden=hidden>";
						
						?>
						<br>
						<?php echo "<li>Contenido: <textarea name=\"contenido-seguridad-send\" rows=\"10\" cols=\"80\">$contenido_seguridad</textarea></li>";	?>
						<br>						
						<button type="submit" onClick="alert('El contenido fue actualizado')">Modificar</button>  &nbsp; &nbsp;  <button type="button"><a href="seguridad-home.php">Cancelar</a></button>
					</form>					
				</div>
			</div>
		</div>
	</div>
	
		
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
	
  </body>
</html>