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
		
		$conexion=mysqli_connect($host,$username,$password,'bdcutcl') or die("Problemas con la conexión");
		$acentos = $conexion->query("SET NAMES 'utf8'");

		$registrosComuna=mysqli_query($conexion,"select * from comuna") or die("Problemas en el select:".mysqli_error($conexion));
	
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
						<a href="index.html">Inicio</a> - Agregar usuario
					</h3>
					<br>
					<form method="post" action="procesarRegistroUsuario.php">
						<li>Nombre: <input type="text" name="nombre"> </li>
						<br>
						<li>Apellido Paterno: <input type="text" name="apellido_paterno"></li>
						<br>
						<li>Apellido Materno: <input type="text" name="apellido_materno"></li>
						<br>
						<li>Sexo: <select name="sexo">
									<option value="masculino">Masculino</option>
									<option value="femenino">Femenino</option>
								  </select></li>
						<br>
						<li>Fecha nacimiento: <input type="text" name="fecha_nacimiento"></li>
						<br>
						<li>Rut: <input type="text" name="rut"></li>
						<br>
						<li>Password: <input type="text" name="pass"></li>
						<br>
						<li>Telefono/Movil: <input type="text" name="telefono"></li>
						<br>
						<li>Comuna residencia: <select name="comuna">
									<?php
									while($reg=mysqli_fetch_array($registrosComuna)){					
										$nombreComuna = $reg['COMUNA_NOMBRE'];	
										echo "<option value=\"$nombreComuna\">$nombreComuna</option>";
									}					
									?>
								  </select>
						
						<!--
						<input type="text" name="comuna_residencia">
						-->
						</li>
						<br>
						<li>Correo electronico: <input type="text" name="email"></li>
						<br>		
						<li>Temas de interes: <textarea name="temas_interes"></textarea></li>
						<br>
						<button type="submit">Enviar</submit>			
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