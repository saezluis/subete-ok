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
	<div>
	
	
	<?php
	
	if(isset($_GET['tipo_usuario'])){
			$tipo_usuario = $_GET['tipo_usuario'];
			$_SESSION["type_user"] = $tipo_usuario;
		}
		
	if(isset($_SESSION["type_user"])){
		$tipo_usuario = $_SESSION["type_user"];
	}
	
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	
	if($tipo_usuario=='todos'){
		$registrosTodos=mysqli_query($conexion,"select * from cuenta") or die("Problemas en el select:".mysqli_error($conexion));
	}else{
		$registrosTodos=mysqli_query($conexion,"select * from cuenta WHERE sistema_web = '$tipo_usuario'") or die("Problemas en el select:".mysqli_error($conexion));
	}
	
	$TAMANO_PAGINA = 30; 
		
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
		
		if($tipo_usuario=='todos'){
			$ssql = "select * from cuenta LIMIT " . $inicio . "," . $TAMANO_PAGINA; 
		}else{
			$ssql = "select * from cuenta WHERE sistema_web = '$tipo_usuario' LIMIT " . $inicio . "," . $TAMANO_PAGINA; 
		}
		$rs = mysqli_query($conexion,$ssql); 
	

	?>
	
	
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center">
					<a href="index.html">Administrador Súbete</a>
				</h3>
			</div>			
		</div>
		<div class="row">
			<div class="col-md-9">
			<h3 class="text-left">
				<?php
				echo "<a href=\"index.html\">Inicio</a> - <a href=\"eliminar-usuario.php\">Eliminar usuario</a> - ".$_SESSION["type_user"]." ";
				?>
			</h3>
			<br>
			<?php			
				
			
				while($reg=mysqli_fetch_array($rs)){					
					$nombre = $reg['nombre'];	
					$apellido_paterno = $reg['apellido_paterno'];					
					$rut = $reg['rut'];

					echo "<span class=\"texto\">";
					
					echo "<span class=\"texto\">Nombre: $nombre Apeliido paterno: $apellido_paterno Rut: <a href=\"elim-usuario.php?rut_send=",urlencode($rut)," \">$rut</a></span>";
					echo "<br>";
					echo "</span>";

				}
				
				mysqli_free_result($rs); 
				
				if ($total_paginas > 1){ 
					for ($i=1;$i<=$total_paginas;$i++){ 
						if ($pagina == $i) 
							//si muestro el índice de la página actual, no coloco enlace 
							echo "<span class=\"pag--cube textSize\">" . $pagina . "</span>" . " "; 
						else 
							//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 				
							echo "<a href='ed-usuario.php?pagina=" . $i . "' class=\"textSize\">"  . $i .  "</a> " ; 
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