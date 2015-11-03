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
      <div class="caja web-50">
        <div id="logo" class="arriba"><img src="img/logo.png"></div>
        <div id="box--login">
          <h1>Te invitamos a ser parte del programa de beneficios de Royal Rental.</h1>
          <form method="post" action="checklogin.php" id="login">
            <label>Rut</label>
            <input name="username" type="text">
            <label>Contraseña</label>
            <input name="password" type="password">
            <button type="submit">Ingresar</button>
            <div class="caja no-padding">
              <button class="recuperar">Recuperar contraseña</button>
            </div>
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
          <form id="registrate">
            <button type="submit">Regístrate aquí</button>
          </form>
        </div>
      </div>
    </header>
  </body>
</html>