<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{

}
else
{
	
header('Content-Type: text/html; charset=UTF-8'); 
	
//echo "<br/>" . "Para tener una mejor experiencia de navegación te recomendamos que actualices tu navegador." . "<br/>";

//echo "<br/>" . "Si el error persiste, puede deberse a las siguientes causas:" . "<br/>";

echo "<br/>" . " <h2> Estás a un click de Subirte, actualiza tu navegador <a href='http://windows.microsoft.com/es-cl/internet-explorer/download-ie'>aquí</a></h2>" . "<br/>";

//echo "<br/>" . " * Estás usando una versión antigua de Internet Explorer, actualízalo." . "<br/>";

//echo "<br/>" . "Entiendo las recomendaciones, volver al <a href='login.php'>Login</a>." . "<br/>";
	
//echo "<br/>" . "Esta pagina es solo para usuarios registrados." . "<br/>";

//echo "<br/>" . "<a href='login.php'>Hacer Login</a>";

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

	<script>
		var avisoTablet = function(){
		 avisoTablet = function(){}; // kill it as soon as it was called
			document.getElementById('aviso').style.display='none';
		 };
	</script>
	
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
			$index_subete = "<div id=\"logo\"><a href=\"index.php\"><img src=\"img/logo.png\"></a></div>";
		}else{
			$status_cata = 'display:none;';
			
		}
		
		if($sistema_web=='interno'){
			$status_bene = 'display:zerocool;';
			
		}else{
			$status_bene = 'display:zerocool;';
		}
				
		if($sistema_web=='unilever'){
			$status_cata = 'display:none;';
			$status_bene = 'display:none;';					
		}
		
		if($sistema_web=='interno' or $sistema_web=='externo'){
			$index_logo = "<div id=\"logo\"><a href=\"index.php\"><img src=\"img/logo.png\"></a></div>";			
		}else{
			$index_logo = "<div id=\"logo\"><a href=\"index.php\"><img src=\"img/logo-unilever.png\"></a></div>";
		}
		
		if($sistema_web=='interno' or $sistema_web=='externo'){
			$index_logo_left = "<div id=\"logo_royal\"><a href=\"http://www.royalrental.cl\" target=\"_blank\" alt=\"Royal Rental\"><img src=\"img/logo_royal.jpg\"></a></div>";
		}else{
			$index_logo_left = "<div id=\"logo-for-unilever\"><img src=\"img/logo-for-lever.png\"  ></div>";
		}
		
		if($sistema_web=='interno' or $sistema_web=='externo'){
			$titulo_convenios = "Nuevos Convenios";
		}else{
			$titulo_convenios = "";
		}
		
		if($sistema_web=='interno' or $sistema_web=='externo'){
			$loader_convenios = $registros_banner_left_02;
		}else{
			$loader_convenios = "";
		}
		
		

	
	?>  
		
	  <header class="grupo">
	
      <?php 	
	    $nombre_user = $nombre." ".$apellido_paterno." ".$apellido_materno;
        echo "<div class=\"caja base-100\">";		
        echo $index_logo;
        echo $index_logo_left;		
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
            <?php echo "<li style=\"$status_cata\"><a href=\"catalogo.php\" class=\"catalogo\">Catálogo</a></li>"; ?>
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
					$link = $reg['link'];
					echo "<li><a href=\"$link\"><img src=\"img/banner/$nombre_banner\" alt=\"\"></a></li>";										
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
          <h3>Galería: día del Operador 2015</h3>
          <div class="caja--actividades">
            <ul id="demo2">
			  <?php
				while($reg=mysqli_fetch_array($registros_banner_left_01)){					
					$nombre_banner = $reg['nombre_banner'];
					echo "<li><a href=\"galeria-de-imagenes.php\"><img src=\"img/banner/$nombre_banner\" alt=\"\"></a></li>";
				}
			  ?>			  
            </ul>
          </div>
        </div>
        <div class="widgets">
          <?php  echo "<h3>$titulo_convenios</h3>";?>
          <div class="caja--actividades">
            <ul id="convenios">
			   <?php
				while($reg=mysqli_fetch_array($loader_convenios)){					
					$nombre_banner = $reg['nombre_banner'];
					echo "<li><a href=\"beneficios.php\"><img src=\"img/banner/$nombre_banner\" alt=\"\"></a></li>";
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
            <h1>Conóce las señaléticas de seguridad de tu empresa</h1>
            <button type="button"><a href="signos-seguridad.php">ver más</a></button>
          </div>
          <div class="caja web-50 item--cajas">
            <div class="guia"></div><img src="img/caluga_2.jpg">
            <h1>Inscribete en nuestros cursos de capacitaciones</h1>
            <button type="button"><a href="productividad.php">ver más</a></button>
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
      <a href="javascript:void(0);" onclick="avisoTablet();" class="closer">X</a>
      <p>Para optimizar tu experiencia en iPad/iPhone debes permitir el uso de cookies en tu dispositivo. Debes entrar en Ajustes --> Safari--> Bloquear cookies --> Permitir siempre.</p>
    </div>
  </body>
</html>