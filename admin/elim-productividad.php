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
	
	$id_produ = $_GET['id_send'];
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$registrosProductividad=mysqli_query($conexion,"select * from produ WHERE id_produ='$id_produ'") or die("Problemas en el select:".mysqli_error($conexion));
	
	if($reg=mysqli_fetch_array($registrosProductividad)){
		
		$titulo_produ = $reg['titulo_produ'];
		$contenido_produ = $reg['contenido_produ'];
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
						echo "<a href=\"index.html\">Inicio</a> - <a href=\"productividad-home.php\">Pilar: Productivdad</a> - Agregar contenido";
					?>						
					</h3>
					<br>
					<form method="post" action="delete-productivdad.php">					
						<?php	
						
						echo "<li>Titulo contenido: <input type=\"text\" size=\"55\" value=\"$titulo_produ\" readonly></li>";	
						
						echo "<input type=\"text\" name=\"id-productividad-send\" value=\"$id_produ\" hidden=hidden>";
						
						?>
						<br>
						<?php echo "<li>Contenido: <textarea rows=\"10\" cols=\"80\" readonly>$contenido_produ</textarea></li>";	?>
						<br>						
						<button type="submit" onClick="alert('El contenido fue eliminado')">Eliminar</button>  &nbsp; &nbsp;  <button type="button"><a href="productividad-home.php">Cancelar</a></button>
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