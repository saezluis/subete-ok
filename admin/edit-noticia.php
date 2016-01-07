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
	
	$id_noticias = $_GET['id_send'];
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$registrosNoticias=mysqli_query($conexion,"select * from noticias WHERE id_noticias='$id_noticias'") or die("Problemas en el select:".mysqli_error($conexion));
	
	if($reg=mysqli_fetch_array($registrosNoticias)){
		
		$nombre_noticia = $reg['nombre_noticia'];
		$contenido = $reg['contenido'];
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
						echo "<a href=\"index.html\">Inicio</a> - Editar noticia";
					?>						
					</h3>
					<br>
					<form method="post" action="update-noticia.php">					
						<?php	
						
						echo "<li>Nombre noticia: <input type=\"text\" name=\"nombre-noticia-send\" size=\"55\" value=\"$nombre_noticia\"></li>";	
						
						echo "<input type=\"text\" name=\"id-noticia-send\" value=\"$id_noticias\" hidden=hidden>";
						
						?>
						<br>
						<?php echo "<li>Contenido: <textarea name=\"contenido-noticia-send\" rows=\"10\" cols=\"80\">$contenido</textarea></li>";	?>
						<br>						
						<button type="submit" onClick="alert('El contenido fue actualizado')">Modificar</button>  &nbsp; &nbsp;  <button type="button"><a href="index.html">Cancelar</a></button>
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