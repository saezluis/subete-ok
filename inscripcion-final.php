<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Login / Súbete</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximun-scale=1">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="js/scripts-min.js"></script>
	
	<script type="text/javascript">

		function validarDatos(){

			if( document.datos.rut.value == "" ){
				alert( "Por favor ingrese su rut" );
				document.datos.rut.focus() ;
				return false;
			}
			
			if( document.datos.clave.value == "" ){
				alert( "Por favor ingrese su clave" );
				document.datos.clave.focus() ;
				return false;
			}
			
			if( document.datos.reClave.value == "" ){
				alert( "Por favor ingrese de nuevo su clave" );
				document.datos.reClave.focus() ;
				return false;
			}
						

			return( true );

		}	
		
	</script>	
	
  </head>
  <body>
    <div id="strip"></div>
    <header class="grupo">
      <div class="caja web-50">
        <div id="logo" class="arriba"><img src="img/logo.png"></div>
        <div id="box--login">
          <h1>Te damos la bienvenida a Súbete, el programa donde todos crecemos.</h1>
		  <br>
		  <h1>Para terminar tu registro ingresa:</h1>
          <form id="login" name="datos" method="post" action="procesar-inscripcion-final.php">
            <label>Rut</label>
            <input type="text" name="rut">
			<label>Correo (igual al usado para el pre-registro)</label>
            <input type="text" name="email">
            <label>Clave</label>
            <input type="password" id="password" name="password">
            <label>Repetir clave</label>
            <input type="password" id="passwordconf" name="passwordconf" oninput="check(this)">            
            <button type="submit" onclick="return(validarDatos())">Enviar</button>
			<!--			
			<label>Password:</label>
			<input type="password" id="password" name="password">
			<label>Confirm Password:</label>
			<input type="password" id="passwordconf" name="passwordconf" oninput="check(this)">
			-->
			<script language='javascript' type='text/javascript'>
			function check(input) {
				if (input.value != document.getElementById('password').value) {
					input.setCustomValidity('Las dos claves deben coincidir.');
				} else {
					// input is valid -- reset the error message
					input.setCustomValidity('');
			   }
			}
			</script>
			
          </form>
        </div>
      </div>
      <div class="caja web-50">
        <div id="box--blue">
          <div id="royalito"><img src="img/royalito.png" class="topR"></div>
          <div id="linea_texto"><img src="img/globo.png">
            <h2>Si aún no tienes una cuenta con nosotros te invitamos a registrarte</h2>
          </div>
        </div>
        <div id="box--naranja">
        </div>
      </div>
    </header>
  </body>
</html>