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
		
		$conexionComuna=mysqli_connect($host,$username,$password,'bdcutcl') or die("Problemas con la conexión");
		$acentos = $conexionComuna->query("SET NAMES 'utf8'");

		$registrosComuna=mysqli_query($conexionComuna,"select * from comuna") or die("Problemas en el select:".mysqli_error($conexionComuna));
		
		$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
		$rut = $_GET['rut_send'];
		
		$registrosCuenta=mysqli_query($conexion,"select * from cuenta WHERE rut = '$rut'") or die("Problemas en el select:".mysqli_error($conexion));
		
		if($row=mysqli_fetch_array($registrosCuenta))
			{
			  $nombre = $row['nombre'];
			  $apellido_paterno = $row['apellido_paterno'];
			  $apellido_materno = $row['apellido_materno'];
			  $sexo = $row['sexo'];
			  $fecha_nacimiento = $row['fecha_nacimiento'];
			  $hash = $row['hash'];
			  $password = $row['password'];
			  $telefono = $row['telefono'];
			  $comuna_residencia = $row['comuna_residencia'];
			  $email = $row['email'];
			  $temas_interes = $row['temas_interes'];
			  $foto_perfil = $row['foto_perfil'];
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
							echo "<a href=\"index.html\">Inicio</a> - <a href=\"editar-usuario.php\">Eliminar usuario</a> - ".$_SESSION["type_user"]." ";
						?>
					</h3>
					<br>
					<form method="post" action="delete-usuario.php">
						<li>Rut: <?php echo "$rut"; ?></li>
						<?php echo "<input type=\"text\" name=\"rut-send\" value=\"$rut\" hidden=hidden>"; ?>
						<?php echo "<input type=\"text\" name=\"hash-send\" value=\"$hash\" hidden=hidden>"; ?>
						<?php echo "<input type=\"text\" name=\"foto-send\" value=\"$foto_perfil\" hidden=hidden>"; ?>
						<br>
						<li>Nombre: <?php echo "<input type=\"text\" name=\"nombre-send\" value=\"$nombre\" readonly>"; ?></li>
						<br>
						<li>Apellido Paterno: <?php echo "<input type=\"text\" name=\"apellido-paterno-send\" value=\"$apellido_paterno\" readonly>"; ?></li>
						<br>
						<li>Apellido Materno: <?php echo "<input type=\"text\" name=\"apellido-materno-send\" value=\"$apellido_materno\" readonly>"; ?></li>
						<br>
						<li>Sexo: <select name="sexo-send" disabled="true">
									 <?php
										$mas = '';
										$fem = '';
										if($sexo=='masculino'){
											$mas = 'selected=selected';
										}else{
											$fem = 'selected=selected';
										}
										echo "<option value=\"masculino\" $mas >Masculino</option>";
										echo "<option value=\"femenino\" $fem >Femenino</option>";
									?>
								  </select></li>
						<br>
						<li>Fecha nacimiento: <?php echo "<input type=\"text\" name=\"fecha-nacimiento-send\" value=\"$fecha_nacimiento\" readonly>"; ?></li>
						<br>						
						<li>Password: <?php echo "<input type=\"text\" name=\"password-send\" value=\"$password\" readonly>"; ?></li>
						<br>
						<li>Telefono/Movil: <?php echo "<input type=\"text\" name=\"telefono-send\" value=\"$telefono\" readonly>"; ?></li>
						<br>
						<li>Comuna residencia: <select name="comuna-send" disabled="true">
									<?php
										while($reg=mysqli_fetch_array($registrosComuna)){					
											$nombreComuna = $reg['COMUNA_NOMBRE'];	
											
											if ($nombreComuna === $comunaUser) {
												echo "<option value=\"$nombreComuna\" selected=selected>$nombreComuna</option>";
											} else {
												echo "<option value=\"$nombreComuna\" >$nombreComuna</option>";
											}														
										}					
									?>
								  </select>
						
						<!--
						<input type="text" name="comuna_residencia">
						-->
						</li>
						<br>
						<li>Correo electronico: <?php echo "<input type=\"text\" name=\"email-send\" value=\"$email\" readonly>"; ?></li>
						<br>		
						<li>Temas de interes: <?php echo "<textarea name=\"temas-interes-send\" readonly>$temas_interes</textarea>"; ?></li>
						<br>
						<button type="submit" onClick="alert('El usuario fue eliminado')">Eliminar usuario</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button type="button"><a href="eliminar-usuario.php">Cancelar</a></button>
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