<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Inicio / Súbete</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximun-scale=1">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="js/scripts-min.js"></script>
    <link rel="stylesheet" href="js/dist/slippry.css">
    <script src="js/dist/slippry.min.js"></script>
  </head>
  <body>
	<?php
		
			if(isset($_GET['id'])){
				$rut_usuario = $_GET['id'];
			}
			
			$conexion=mysqli_connect("localhost","root","123","subete") or die("Problemas con la conexión");
			$acentos = $conexion->query("SET NAMES 'utf8'");
			
			$registros=mysqli_query($conexion,"select * from cuenta where rut = '4548848-4'")
			or die("Problemas en el select:".mysqli_error($conexion));
			
			if($reg=mysqli_fetch_array($registros)){
		
				$nombre = $reg['nombre'];
				$apellido_paterno = $reg['apellido_paterno'];
				$apellido_materno = $reg['apellido_materno'];
				$sexo = $reg['sexo'];
				$fecha_nacimiento = $reg['fecha_nacimiento'];
				$rut = $reg['rut'];
				$telefono = $reg['telefono'];
				$email = $reg['email'];
				$password = $reg['password'];
				$temas_interes = $reg['temas_interes'];
				$foto_perfil = $reg['foto_perfil'];
				
			}
	
		?>  
    <header class="grupo">
      <div class="caja base-100">
        <div id="logo"><a href="index.php"><img src="img/logo.png"></a></div>
        <div id="logo_royal"><a href="http://www.royalrental.cl" target="_blank" alt="Royal Rental"><img src="img/logo_royal.jpg"></a></div>
        <div id="admin-header">
          <div id="admin--data"><img src="img/user.jpg" class="circulo"><span class="nombre_usuario">Jorge Ortiz L.</span></div>
          <div id="cuenta">
            <ul>
			  <?php 
			  $rut = '4548848-4';			  
              echo "<li><a href=\"mi-cuenta.php?id=",urlencode($rut)," \" class=\"micuenta\">Mi cuenta</a></li>";
			  //echo "<li><a href=\"detalle-cocina.php?deta=",urlencode($var)," \">".$reg['nombre']." ".$reg['modelo']."</a></li>";
			  ?>
              <li><a href="#" class="cerrar">Cerrar</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="caja base-100">
        <div id="menu">
          <ul>
            <li><a href="que-es-subete.php">¿Qué es Súbete?</a></li>
            <li><a href="videos.html">Videos</a></li>
            <li><a href="contacto.html">Contacto</a></li>
          </ul>
        </div>
      </div>
    </header>
    <section class="grupo">
      <div class="caja base-100">
        <nav class="navegacion">
          <ul>
            <li><a href="#" class="seguridad">Seguridad</a></li>
            <li><a href="#" class="productividad">Productividad</a></li>
            <li><a href="#" class="responsabilidad">Responsabilidad</a></li>
            <li><a href="#" class="superacion">Superación</a></li>
            <li><a href="#" class="optimismo">Optimismo</a></li>
            <li><a href="#" class="profesionalismo">Profesionalismo</a></li>
            <li><a href="#" class="catalogo">Catálogo</a></li>
            <li><a href="#" class="beneficios">Beneficios</a></li>
          </ul>
        </nav>
      </div>
    </section>
	
    <section class="grupo">
      <div class="caja web-100">
        <div id="slider">
          <ul id="demo1">
            <li><a href="#slide1"><img src="img/banner.jpg" alt=""></a></li>
            <li><a href="#slide2"><img src="img/banner.jpg" alt=""></a></li>
            <li><a href="#slide3"><img src="img/banner.jpg" alt=""></a></li>
          </ul>
          <div id="noticias">
            <h1>Noticias</h1>
            <div id="noticias-scroll" class="centrar">
              <ul>
                <li><a href="#">
                    Inscríbete en el curso:<br/>
                    Movimiento físico y almacenamiento
                    de mercaderías en bodegas, y centros
                    de distribución Cupos limitados.				</a></li>
                <li><a href="#">Participa en el taller uso correcto deindumentaria en bodegas de la ACHS Cupos limitados</a></li>
                <li><a href="#">Participa en el taller uso correcto de indumentaria en bodegas de la ACHS Cupos limitados.</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="search" class="grupo">
      <div class="caja web-100">
        <form id="busqueda">
          <input type="text" placeholder="buscar dentro del sitio">
          <button type="submit">Buscar</button>
        </form>
      </div>
    </section>
    <div id="main" class="grupo">
      <div id="sidebar" class="caja web-35">
        <h2>Estas son las noticias y beneficios para ti</h2>
        <div class="widgets">
          <h3>Actividades Súbete</h3>
          <div class="caja--actividades">
            <ul id="demo2">
              <li><a href="#slide1"><img src="img/actividades.jpg" alt=""></a></li>
              <li><a href="#slide2"><img src="img/actividades.jpg" alt=""></a></li>
              <li><a href="#slide3"><img src="img/actividades.jpg" alt=""></a></li>
            </ul>
          </div>
        </div>
        <div class="widgets">
          <h3>Nuevos convenios</h3>
          <div class="caja--actividades">
            <ul id="convenios">
              <li><a href="#slide1"><img src="img/convenios.jpg" alt=""></a></li>
              <li><a href="#slide2"><img src="img/convenios.jpg" alt=""></a></li>
              <li><a href="#slide3"><img src="img/convenios.jpg" alt=""></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div id="content" class="caja web-65">
        <div id="slide-content">
          <ul id="slideprogramas">
            <li><a href="#slide1"><img src="img/banner-programa.jpg" alt=""></a></li>
            <li><a href="#slide2"><img src="img/banner-programa.jpg" alt=""></a></li>
            <li><a href="#slide3"><img src="img/banner-programa.jpg" alt=""></a></li>
          </ul>
        </div>
        <div id="contenido">
          <div class="caja web-50 item--cajas">
            <div class="guia"></div><img src="img/caluga_1.jpg">
            <h1>Conóce los signos de seguridad de tu empresa,con este mini juego</h1>
            <button type="button">ver más</button>
          </div>
          <div class="caja web-50 item--cajas">
            <div class="guia"></div><img src="img/caluga_2.jpg">
            <h1>Inscribete en nuestro workshop de productividad</h1>
            <button type="button">ver más</button>
          </div>
        </div>
      </div>
    </div>
    <footer class="total">
      <div class="grupo">
        <div class="caja web-25">
          <div id="logo--footer"><a href="http://www.royalrental.cl" target="_blank"><img src="img/logo--footer.png"></a></div>
        </div>
        <div class="caja web-25"></div>
        <div class="caja web-25">			</div>
        <div class="caja web-25">
          <form id="footer" class="right">
            <p>Escríbenos si tienes  dudas o sugerencias</p>
            <textarea name="textarea" placeholder="Escríbenos si tienes  dudas o sugerencias"> </textarea>
            <button type="submit">Enviar</button>
          </form>
        </div>
      </div>
    </footer>
  </body>
</html>