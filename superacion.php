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
    <title>Superación / Súbete</title>
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
		if(isset($_GET['id_superacion'])){
			$id_superacion = $_GET['id_superacion'];
			$get_activo = true;
		}
		
		$login_email = $_SESSION['username'];
		
		include_once 'config.php';
		
		$conexion=mysqli_connect($host,$username,$password,$db_name) or die("Problemas con la conexión");
		$acentos = $conexion->query("SET NAMES 'utf8'");
		
		$registros=mysqli_query($conexion,"select * from cuenta where email = '$login_email'")
		or die("Problemas en el select:".mysqli_error($conexion));
			
		if($reg=mysqli_fetch_array($registros)){
		
			$nombre = $reg['nombre'];
			$apellido_paterno = $reg['apellido_paterno'];
			$apellido_materno = $reg['apellido_materno'];			
			$rut = $reg['rut'];			
			$foto_perfil = $reg['foto_perfil'];
				
		}
			
		$registros_banner_left_01=mysqli_query($conexion,"select * from banner where frame = 'left_01'")
		or die("Problemas en el select:".mysqli_error($conexion));
		
		$registros_banner_left_02=mysqli_query($conexion,"select * from banner where frame = 'left_02'")
		or die("Problemas en el select:".mysqli_error($conexion));
		
		//Inserta comentarios del footer en la Base de Datos
		if(isset($_POST['comentario'])){
			$sugerencias = $_POST['comentario'];
			
			mysqli_query($conexion,"insert into sugerencia(rut,comentario) values ('$_REQUEST[rut_send]','$_REQUEST[comentario]')")
			or die("Problemas con el insert de los servicios");
			
		}
		
		if(@$get_activo==true){
			$registros_superacion = mysqli_query($conexion,"SELECT * FROM superacion WHERE id_superacion = '$id_superacion'")
			or die("Problemas en el select:".mysqli_error($conexion));
		}else{
			$registros_superacion = mysqli_query($conexion,"SELECT * FROM superacion WHERE id_superacion = (SELECT MAX(id_superacion) FROM superacion)")
			or die("Problemas en el select:".mysqli_error($conexion));
		}
		
		if($reg=mysqli_fetch_array($registros_superacion)){
		
			$id_superacion = $reg['id_superacion'];
			$imagen_superacion = $reg['imagen_superacion'];
			$titulo_superacion = $reg['titulo_superacion'];
			$contenido_superacion = $reg['contenido_superacion'];			
			
		}
		
		$registrosSistema=mysqli_query($conexion,"select * from usuarios where correo = '$login_email'") or die("Problemas en el select:".mysqli_error($conexion));
		
		if($reg=mysqli_fetch_array($registrosSistema)){
		
			$sistema_web = $reg['sistema_web'];
	
		}
		
		if(@$sistema_web=='interno'){
			$status_cata = 'display:zerocool;';			
		}else{
			$status_cata = 'display:none;';
		}
		
		if(@$sistema_web=='interno'){
			$status_bene = 'display:zerocool;';			
		}else{
			$status_bene = 'display:none;';
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
            <li><a href="seguridad.php" class="seguridad">Seguridad</a></li>
            <li><a href="productividad.php" class="productividad">Productividad</a></li>
            <li><a href="responsabilidad.php" class="responsabilidad">Responsabilidad</a></li>
            <li><a href="superacion.php" class="superacion">Superación</a></li>
            <li><a href="optimismo.php" class="optimismo">Optimismo</a></li>
            <li><a href="profesionalismo.php" class="profesionalismo">Profesionalismo</a></li>
            <?php echo "<li style=\"$status_cata\"><a href=\"#\" class=\"catalogo\">Catálogo</a></li>"; ?>
			<?php echo "<li style=\"$status_bene\"><a href=\"#\" class=\"beneficios\">Beneficios</a></li>"; ?>
          </ul>
        </nav>
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
        <div id="titulo-menu-colores"><img src="img/royalito_mini.png" class="izquierda">
          <h1>Superación</h1>
        </div>
        <p class="texto-conceptos">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit error quod fugiat qui magni quia odio consectetur amet praesentium temporibus nemo mollitia reiciendis laboriosam, quasi ut ab! Commodi, amet, quaerat!</p>
		
        <?php
			echo "<div id=\"imagen-destacada\"><img src=\"img/superacion/$imagen_superacion\">";
			  echo "<h2>$titulo_superacion</h2>";
			  echo "<p>$contenido_superacion</p>";			  			  
			  echo "<form method=\"post\">";
			  echo "<button type=\"submit\" formaction=\"superacion-anteriores.php\" >Publicaciones anteriores </button>";				
				echo "<input type=\"text\" name=\"superacion_send\" value=\"$id_superacion\" hidden=hidden>";									  
			  echo "</form>";
			echo "</div>";					
		?>
		
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
  </body>
</html>