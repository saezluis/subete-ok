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
	<div id="megaTarget">	
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10">
					<h4 class="text-left">
						Gestión de usuarios - Consultar usuarios.
					</h4>
					<div class="btn-group">
						 
						<button class="btn btn-default">
							Seleccione
						</button> 
						<button data-toggle="dropdown" class="btn btn-default dropdown-toggle">
							<span class="caret"></span>
						</button>
						
						<ul class="dropdown-menu">
							<li>
								<?php
								$tipo_usuario = 'todos';
								echo "<a href=\"pc-usuario.php?tipo_usuario=",urlencode($tipo_usuario)," \">Todos</a>";
								?>
								
							</li>
							<li>
								<?php
								$tipo_usuario = 'interno';
								echo "<a href=\"pc-usuario.php?tipo_usuario=",urlencode($tipo_usuario)," \">Internos</a>";
								?>
							</li>
							<li>
								<?php
								$tipo_usuario = 'externo';
								echo "<a href=\"pc-usuario.php?tipo_usuario=",urlencode($tipo_usuario)," \">Externos</a>";
								?>
							</li>
							<li>
								<?php
								$tipo_usuario = 'unilever';
								echo "<a href=\"pc-usuario.php?tipo_usuario=",urlencode($tipo_usuario)," \">Unilever</a>";
								?>
							</li>
							<!--
							<li class="disabled">
								<a href="#">Another action</a>
							</li>
							<li class="divider">
							</li>
							<li>
								<a href="#">Something else here</a>
							</li>
							-->
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