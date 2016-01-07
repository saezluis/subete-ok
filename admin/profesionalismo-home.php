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
						<a href="index.html">Inicio</a> - Pilar: Profesionalismo
					</h3>
					<div class="btn-group">
						<br>												
						<ul>
							<li>
								<?php
								echo "<a href=\"profesionalismo-consultar.php\">Consultar contenidos</a>";
								?>
								
							</li>
							<li>
								<?php
								echo "<a href=\"profesionalismo-agregar.php\">Agregar contenido</a>";
								?>
							</li>
							<li>
								<?php
								echo "<a href=\"profesionalismo-activo.php\">Establecer contenido activo</a>";
								?>
							</li>
							<li>
								<?php
								echo "<a href=\"profesionalismo-modificar.php\">Modificar contenidos</a>";
								?>
							</li>
							<li>
								<?php
								echo "<a href=\"el-profesionalismo.php\">Eliminar contenidos</a>";
								?>
							</li>							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>