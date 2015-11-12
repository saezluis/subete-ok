<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Login / Súbete</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximun-scale=1">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="js/scripts-min.js"></script>
  </head>
  <body>
    <div id="strip"></div>
    <header class="grupo">
      <div class="caja tablet-50 web-50">
        <div id="logo" class="arriba"><img src="img/logo.png"></div>
        <div id="box--check">
          <div id="royalito-check"><img src="img/royalito.png"></div>
        </div>
      </div>
      <div class="caja tablet-50 web-50">
        <div id="alerta">
          <h1>Tu opinión es muy importante para nosotros.</h1>
          <p style="color:#fff; background:#01adef !important;" class="alarm">
            Muy pronto tendremos una nueva encuesta para saber en qué podemos mejorar. 
            <br><a href="" onclick="goBack()" style="padding: 0.5em 1em; margin-top: 1em; display: block; background:#040452; color:#fff; width:100%; text-align: center; text-decoration:none;">VOLVER  </a>
          </p>
        </div>
      </div>
    </header>
	<script>
			function goBack() {
				window.history.back();
			}
		  </script>
  </body>
</html>