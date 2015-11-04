<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{

}
else
{
echo "<br/>" . "Esta pagina es solo para usuarios registrados." . "<br/>";
echo "<br/>" . "<a href='login.php'>Hacer Login</a>";

exit;
}
$now = time(); // checking the time now when home page starts

if($now > $_SESSION['expire'])
{
session_destroy();
echo "<br/><br />" . "Su sesion a terminado, <a href='login.php'> Necesita Hacer Login</a>";
exit;
}
?>
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
		
		include_once 'config.php';
		
		$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
		$acentos = $conexion->query("SET NAMES 'utf8'");

		//Inserta comentarios del footer en la Base de Datos
		if(isset($_POST['comentario'])){
			$sugerencias = $_POST['comentario'];
			
			mysqli_query($conexion,"insert into sugerencia(rut,comentario) values ('$_REQUEST[rut_send]','$_REQUEST[comentario]')")
			or die("Problemas con el insert de los servicios");
			
		}
				
		$login_email = $_SESSION['username'];
				
		$registros=mysqli_query($conexion,"select * from cuenta where rut = '$login_email'") or die("Problemas en el select:".mysqli_error($conexion));
			
		if($reg=mysqli_fetch_array($registros)){
		
			$nombre = $reg['nombre'];
			$rut = $reg['rut'];
			$hash = $reg['hash'];
			$apellido_paterno = $reg['apellido_paterno'];
			$apellido_materno = $reg['apellido_materno'];			
			$foto_perfil = $reg['foto_perfil'];
				
		}
		

		$registros_banner_sup=mysqli_query($conexion,"select * from banner where frame = 'sup'")
		or die("Problemas en el select:".mysqli_error($conexion));
		
		$registros_banner_left_01=mysqli_query($conexion,"select * from banner where frame = 'left_01'")
		or die("Problemas en el select:".mysqli_error($conexion));
		
		$registros_banner_left_02=mysqli_query($conexion,"select * from banner where frame = 'left_02'")
		or die("Problemas en el select:".mysqli_error($conexion));
			
		$registros_banner_right_01=mysqli_query($conexion,"select * from banner where frame = 'right_01'")
		or die("Problemas en el select:".mysqli_error($conexion));
		
		$registrosNoticias = mysqli_query($conexion,"SELECT * FROM noticias ORDER BY id_noticias DESC LIMIT 3")
		or die("Problemas en el select:".mysqli_error($conexion));
		
		$registrosSistema=mysqli_query($conexion,"select * from cuenta where rut = '$login_email'") or die("Problemas en el select:".mysqli_error($conexion));
		
		if($reg=mysqli_fetch_array($registrosSistema)){
		
			$sistema_web = $reg['sistema_web'];
	
		}
		
		if($sistema_web=='interno'){
			$status_cata = 'display:zerocool;';			
		}else{
			$status_cata = 'display:none;';
		}
		
		if($sistema_web=='interno'){
			$status_bene = 'display:zerocool;';			
		}else{
			$status_bene = 'display:zerocool;';
		}
				
	
	?>  
		
	  <header class="grupo">
	
      <?php 	
	    $nombre_user = $nombre." ".$apellido_paterno." ".$apellido_materno;
        echo "<div class=\"caja base-100\">";
        echo "<div id=\"logo\"><a href=\"index.php\"><img src=\"img/logo.png\"></a></div>";
        echo "<div id=\"logo_royal\"><a href=\"http://www.royalrental.cl\" target=\"_blank\" alt=\"Royal Rental\"><img src=\"img/logo_royal.jpg\"></a></div>";
        echo "<div id=\"admin-header\">";
          echo "<div id=\"admin--data\"><img src=\"img/img-perfil/$foto_perfil\" class=\"circulo\"><span class=\"nombre_usuario\">$nombre_user</span></div>";
          echo "<div id=\"cuenta\">";
            echo "<ul>";
			  echo "<li><a href=\"mi-cuenta.php\" class=\"micuenta\">Mi cuenta</a></li>";			  			 		
              echo "<li><a href=\"logout.php\" class=\"cerrar\">Cerrar</a></li>";
            echo "</ul>";
          echo "</div>";
        echo "</div>";
      echo "</div>";
	  ?>
	   <a href="contacto.php" class="btnLateral">Contacto</a>
      <div class="caja base-100">
<!--         <div id="menu">
          <ul>
            <li><a href="que-es-subete.php
videos.html
contacto.html">¿Qué es Súbete?</a></li>
            <li><a href="que-es-subete.php
videos.html
contacto.html">Videos</a></li>
            <li><a href="que-es-subete.php
videos.html
contacto.html">Contacto</a></li>
          </ul>
        </div> -->
      </div>
    </header>
    <section class="grupo">
      <div class="caja base-100">
        <nav class="navegacion">
          <ul>
            <li><a href="seguridad.php" class="seguridad">Seguridad</a></li>
            <li><a href="productividad.php" class="productividad">Productividad</a></li>
            <li><a href="responsabilidad.php" class="responsabilidad">Responsabilidad</a></li>
            <li><a href="superacion.php" class="superacion">Superación</a></li>
            <li><a href="optimismo.php" class="optimismo">Optimismo</a></li>
            <li><a href="profesionalismo.php" class="profesionalismo">Profesionalismo</a></li>
            <?php echo "<li style=\"$status_cata\"><a href=\"#\" class=\"catalogo\">Catálogo</a></li>"; ?>
			<?php echo "<li style=\"$status_bene\"><a href=\"beneficios.php\" class=\"beneficios\">Beneficios</a></li>"; ?>            
          </ul>
        </nav>
      </div>
    </section>
	
    <section class="grupo">
      <div class="caja web-100">
        <div id="slider">
          <ul id="demo1">
			<!-- Construir un while que construya el banner, en teoria se deberian mostrar 3 max al mismo tiempo -->
			<?php
				while($reg=mysqli_fetch_array($registros_banner_sup)){					
					$nombre_banner = $reg['nombre_banner'];
					echo "<li><a href=\"#slide1\"><img src=\"img/banner/$nombre_banner\" alt=\"\"></a></li>";										
				}
			?>			
          </ul>
          <div id="noticias">
            <h1>Noticias</h1>
            <div id="noticias-scroll" class="centrar">
              <ul>                
				<?php
					while($reg=mysqli_fetch_array($registrosNoticias)){					
						$nombre_noticia = $reg['nombre_noticia'];	
						$id_noticia = $reg['id_noticias'];
						
						echo "<li><a href=\"noticias.php?id_noticia=",urlencode($id_noticia)," \">$nombre_noticia</a></li>";										
						//Que en el link se envie la url de noticias con el codigo de la noticia para buscarla y mostrarla
					}
				?>			    
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="search" class="grupo">
      <div class="caja web-100">
        <form id="busqueda" method="post" action="resultados-busqueda.php">
          <input name="palabraClave" type="text" placeholder="buscar dentro del sitio">
          <button type="submit">Buscar</button>
        </form>
      </div>
    </section>
    <div id="main" class="grupo">
      <div id="sidebar" class="caja tablet-35 web-35">
        <h2>Estas son las noticias y beneficios para ti</h2>
        <div class="widgets">
          <h3>Actividades Súbete</h3>
          <div class="caja--actividades">
            <ul id="demo2">
			  <?php
				while($reg=mysqli_fetch_array($registros_banner_left_01)){					
					$nombre_banner = $reg['nombre_banner'];
					echo "<li><a href=\"#slide1\"><img src=\"img/banner/$nombre_banner\" alt=\"\"></a></li>";
				}
			  ?>			  
            </ul>
          </div>
        </div>
        <div class="widgets">
          <h3>Nuevos convenios</h3>
          <div class="caja--actividades">
            <ul id="convenios">
			   <?php
				while($reg=mysqli_fetch_array($registros_banner_left_02)){					
					$nombre_banner = $reg['nombre_banner'];
					echo "<li><a href=\"#slide1\"><img src=\"img/banner/$nombre_banner\" alt=\"\"></a></li>";
				}
			  ?>			  			  
            </ul>
          </div>
        </div>
      </div>
      <div id="content" class="caja tablet-65 web-65">
        <div id="slide-content">
          <ul id="slideprogramas">
			<?php
				while($reg=mysqli_fetch_array($registros_banner_right_01)){					
					$nombre_banner = $reg['nombre_banner'];
					echo "<li><a href=\"seguridad.php\"><img src=\"img/banner/$nombre_banner\" alt=\"\"></a></li>";
				}
			  ?>					   
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
        <div class="caja web-50">
          <div id="menuComple" class="centrar">
            <ul>
              <li><a href="que-es-subete.php">¿Que es Súbete?</a></li>
              <li><a href="videos.php">Videos</a></li>
              <li><a href="contacto.php">Contacto</a></li>
              <li><a href="encuesta.php">Encuesta</a></li>
            </ul>
          </div>
        </div>
<!--         <div class="caja web-25"></div> -->
        <div class="caja web-25">
          <form method="post" id="footer" class="right">
            <p>Escríbenos si tienes  dudas o sugerencias</p>
            <textarea name="comentario" placeholder="Escríbenos si tienes  dudas o sugerencias"></textarea>
            <button type="submit">Enviar</button>
			<?php
				echo "<input type=\"text\" name=\"rut_send\" value=\"$rut\" hidden=hidden>";	
			?>
          </form>
        </div>
      </div>
    </footer>
    <div id="aviso">
      <a href="javascript:void(0);" onclick="document.getElementById('aviso').style.display='none';" class="closer">X</a>
      <p>Para optimizar tu experiencia en ipad/iphone debes permitir el uso de cookies en tu dispositivo. Debes entrar en Ajustes --> Safari--> Bloquear cookies --> Permitir siempre.</p>
    </div>
  </body>
</html>