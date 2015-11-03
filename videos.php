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
    <title>Inicio / Qué es Súbete</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximun-scale=1">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="js/scripts-min.js"></script>

	
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
			$apellido_paterno = $reg['apellido_paterno'];
			$apellido_materno = $reg['apellido_materno'];			
			$foto_perfil = $reg['foto_perfil'];
				
		}
		
		$registrosSistema=mysqli_query($conexion,"select * from usuarios where rut = '$login_email'") or die("Problemas en el select:".mysqli_error($conexion));
		
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
            <li><a href="que-es-subete.html">¿Qué es Súbete?</a></li>
            <li><a href="videos.html">Videos</a></li>
            <li><a href="contacto.html">Contacto</a></li>
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
	
	<?php
	//echo $recurso;
	
	if(@$_REQUEST['video'] != ''){
		$recurso = @$_REQUEST['video'];	
	}else{
		$recurso = "https://www.youtube.com/embed/dq5TWOYS2G8";
	}
	
	echo "<form method=\"post\">";
		echo "<div id=\"main\" class=\"grupo\">";
		  echo "<article>";
			echo "<div class=\"caja web-100\">";
			  echo "<div class=\"ed-video\">";
				echo "<iframe width=\"420\" height=\"315\" src=\"$recurso\" frameborder=\"0\" allowfullscreen=\"\"></iframe>";
			  echo "</div>";
			echo "</div>";
		  echo "</article>";
		  echo "<article class=\"mini\">";
			echo "<div class=\"caja base-25 movil-25 tablet-25 web-25\"><button name=\"video\" value=\"https://www.youtube.com/embed/dq5TWOYS2G8\" type=\"submit\"><img src=\"img/video0.jpg\"></button></div>";
			echo "<div class=\"caja base-25 movil-25 tablet-25 web-25\"><button name=\"video\" value=\"https://www.youtube.com/embed/QIowq_0xjvw\" type=\"submit\"><img src=\"img/video1.jpg\"></button></div>";
			echo "<div class=\"caja base-25 movil-25 tablet-25 web-25\"><button name=\"video\" value=\"https://www.youtube.com/embed/z7lPSkCWOcM\" type=\"submit\"><img src=\"img/video2.jpg\"></button></div>";
			echo "<div class=\"caja base-25 movil-25 tablet-25 web-25\"><button name=\"video\" value=\"https://www.youtube.com/embed/lbzUKOfy0OE\" type=\"submit\"><img src=\"img/video3.jpg\"></button></div>";
			
			
		  echo "</article>";
		echo "</div>";
	echo "</form>";
	?>
	
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

  
