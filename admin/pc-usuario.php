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
	
	<style>
	.texto {
		font-family: Arial;	
	}
	
	.textSize {
		font-size: 24px;
	}
	</style>

  </head>
  <body>
	<div id="otherTarget">
	
	
	<?php
	
	if(isset($_GET['tipo_usuario'])){
			$tipo_usuario = $_GET['tipo_usuario'];
			$_SESSION["type_user"] = $tipo_usuario;
		}
		
	
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	
	$registrosTodos=mysqli_query($conexion,"select * from cuenta") or die("Problemas en el select:".mysqli_error($conexion));
	
	$TAMANO_PAGINA = 10; 
		
		//examino la página a mostrar y el inicio del registro a mostrar 
		@$pagina = $_GET["pagina"]; 
		if (!$pagina) { 
			$inicio = 0; 
			$pagina=1; 
		} 
		else { 
			$inicio = ($pagina - 1) * $TAMANO_PAGINA; 
		}
		
		$num_total_registros = mysqli_num_rows($registrosTodos); 
		//calculo el total de páginas 
		$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 
		
		$ssql = "select * from cuenta limit " . $inicio . "," . $TAMANO_PAGINA; 
		$rs = mysqli_query($conexion,$ssql); 
	

	?>
	
	
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-9">
			<h3 class="text-center">
				<?php
				echo "Gestión de usuarios - Consultar: ".$_SESSION["type_user"]." ";
				?>
			</h3>
			<?php			
				
			
				while($reg=mysqli_fetch_array($rs)){					
					$nombre = $reg['nombre'];	
					$apellido_paterno = $reg['apellido_paterno'];
					$apellido_materno = $reg['apellido_materno'];
					$sexo = $reg['sexo'];
					$fecha_nac = $reg['fecha_nacimiento'];
					$rut = $reg['rut'];
					$hash = $reg['hash'];
					$telefono = $reg['telefono'];
					$comuna = $reg['comuna_residencia'];
					$email = $reg['email'];
					$temas_interes = $reg['temas_interes'];
					$sistema_web = $reg['sistema_web'];
					$cargo = $reg['cargo'];
					$empresa = $reg['empresa'];
					
					echo "<span class=\"texto\">";
					
					echo "<span class=\"texto\">Nombre: </span>".$nombre;
					echo "<br>";
					echo "<span class=\"texto\">Apeliido paterno: </span>".$apellido_paterno;
					echo "<br>";
					echo "<span class=\"texto\">Apeliido materno: </span>".$apellido_materno;
					echo "<br>";
					echo "<span class=\"texto\">Sexo: </span>".$sexo;
					echo "<br>";
					echo "<span class=\"texto\">Fecha de nacimiento: </span>".$fecha_nac;
					echo "<br>";
					echo "<span class=\"texto\">Rut: </span>".$rut;
					echo "<br>";
					echo "<span class=\"texto\">Hash: </span>".$hash;
					echo "<br>";
					echo "<span class=\"texto\">Telefono: </span>".$telefono;
					echo "<br>";
					echo "<span class=\"texto\">Comuna: </span>".$comuna;
					echo "<br>";
					echo "<span class=\"texto\">Email: </span>".$email;
					echo "<br>";
					echo "<span class=\"texto\">Temas Interes: </span>".$temas_interes;
					echo "<br>";
					echo "<span class=\"texto\">Sistema web: </span>".$sistema_web;
					echo "<br>";
					echo "<span class=\"texto\">Cargo: </span>".$cargo;
					echo "<br>";
					echo "<span class=\"texto\">Empresa: </span>".$empresa;
					echo "<br>";
					
					echo "</span>";
					
					
					echo "<br>";
					echo "<br>";
				}
				
				mysqli_free_result($rs); 
				
				if ($total_paginas > 1){ 
					for ($i=1;$i<=$total_paginas;$i++){ 
						if ($pagina == $i) 
							//si muestro el índice de la página actual, no coloco enlace 
							echo "<span class=\"pag--cube textSize\">" . $pagina . "</span>" . " "; 
						else 
							//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 				
							echo "<a href='pc-usuario.php?pagina=" . $i . "' class=\"textSize\">"  . $i .  "</a> " ; 
					}   
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