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
	
	<script>
	
		function mensaje(){
			alert( "Articulo establecido como activo de manera correcta" );
		}
		
	</script>

  </head>
  <body>
	<div>
	
	
	<?php
	/*
	if(isset($_GET['tipo_usuario'])){
			$tipo_usuario = $_GET['tipo_usuario'];
			$_SESSION["type_user"] = $tipo_usuario;
		}
		
	if(isset($_SESSION["type_user"])){
		$tipo_usuario = $_SESSION["type_user"];
	}
	*/
	include_once 'config.php';
	
	$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
	$acentos = $conexion->query("SET NAMES 'utf8'");
	
	$registrosTodos=mysqli_query($conexion,"select * from profesionalismo") or die("Problemas en el select:".mysqli_error($conexion));
	

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
		
		$ssql = "select * from profesionalismo LIMIT " . $inicio . "," . $TAMANO_PAGINA; 
		
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
				echo "<a href=\"index.html\">Inicio</a> - <a href=\"profesionalismo-home.php\">Pilar: Profesionalismo</a> - Consultar contenidos";
				?>
			</h3>
			<br>
			<?php			

				$estatus = "activo";
				
				while($reg=mysqli_fetch_array($rs)){
					$id_profe = $reg['id_profe'];
					$imagen_profe = $reg['imagen_profe'];
					$titulo_profe = $reg['titulo_profe'];
					$contenido_profe = $reg['contenido_profe'];
										
					
					$sendThis = $estatus.$id_profe;
					
					echo "<span class=\"texto\">";
					
					echo "<span class=\"texto\">Titulo articulo: </span>".$titulo_profe;
					echo "<br>";
					echo "<br>";
					echo "<span class=\"texto\">Contenido articulo: </span>".$contenido_profe;
					echo "<br>";					
					echo "<span class=\"texto\" onclick=\"mensaje();\"><a href=\"profesionalismo-establecer-activo.php?estatus=",urlencode($sendThis)," \">Establecer como articulo activo</a></span>";
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
							echo "<a href='profesionalismo-activo.php?pagina=" . $i . "' class=\"textSize\">"  . $i .  "</a> " ; 
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