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
    <title>Inicio / Mi cuenta</title>
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
	
      <?php 	
	    $nombre_user = $nombre." ".$apellido_paterno." ".$apellido_materno;
        echo "<div class=\"caja base-100\">";
        echo "<div id=\"logo\"><a href=\"index.php\"><img src=\"img/logo.png\"></a></div>";
        echo "<div id=\"logo_royal\"><a href=\"http://www.royalrental.cl\" target=\"_blank\" alt=\"Royal Rental\"><img src=\"img/logo_royal.jpg\"></a></div>";
        echo "<div id=\"admin-header\">";
          echo "<div id=\"admin--data\"><img src=\"img/img-perfil/$foto_perfil\" class=\"circulo\"><span class=\"nombre_usuario\">$nombre_user</span></div>";
          echo "<div id=\"cuenta\">";
            echo "<ul>";
			  
			  $rut = '4548848-4';			  
              echo "<li><a href=\"mi-cuenta.php?id=",urlencode($rut)," \" class=\"micuenta\">Mi cuenta</a></li>";
			  //echo "<li><a href=\"detalle-cocina.php?deta=",urlencode($var)," \">".$reg['nombre']." ".$reg['modelo']."</a></li>";
			  
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
	  
	  <?php
		
			if(isset($_GET['id'])){
				$rut_usuario = $_GET['id'];
			}
			
			$conexion=mysqli_connect("localhost","root","123","subete") or die("Problemas con la conexión");
			$acentos = $conexion->query("SET NAMES 'utf8'");
			
			$registros=mysqli_query($conexion,"select * from cuenta where rut = '$rut_usuario'")
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
	  
      <div id="content" class="caja web-65">
        <div class="caja web-100">
          <h4>Mi Cuenta</h4>
		  <?php
			echo "<img src=\"img/img-perfil/$foto_perfil\" class=\"circulo foo\">";
		  ?>
        </div>
        <div class="limpiar"> </div>
        <form id="perfil">
          <fieldset>
            <h1>Datos de cuenta</h1>
            <div class="caja web-30">
              <label>Nombre</label>
              <?php echo "<input name=\"nombre\" value=\"$nombre\" type=\"text\">"; ?>
            </div>
            <div class="caja web-30">
              <label>Apellido paterno</label>
              <?php echo "<input name=\"apellido_paterno\" value=\"$apellido_paterno\" type=\"text\">"; ?>
            </div>
            <div class="caja web-40">
              <label>Apellido materno</label>
              <?php echo "<input name=\"apellido_materno\" value=\"$apellido_materno\" type=\"text\">"; ?>
            </div>
            <div class="caja web-30">
              <label>sexo</label>
              <select name="sexo" class="sel">
			  <?php
			    $mas = '';
				$fem = '';
				if($sexo=='Masculino'){
					$mas = 'selected=selected';
				}else{
					$fem = 'selected=selected';
				}
                echo "<option value=\"masculino\" $mas >Masculino</option>";
                echo "<option value=\"femenino\" $fem >Femenino</option>";
				?>
              </select>
            </div>
            <div class="caja web-30">
              <label>Fecha de nacimieto</label>
              <?php 
					$newDate = date("d-m-Y", strtotime($fecha_nacimiento));	
					echo "<input name=\"fecha_nacimiento\" value=\"$newDate\" type=\"text\">";
			  ?>
            </div>
            <div class="caja web-40">
              <label>RUT</label>
              <?php echo "<input name=\"rut\" value=\"$rut\" type=\"text\">"; ?>
            </div>
            <div class="caja web-30">
              <label>Teléfono / móvil</label>
              <?php echo "<input name=\"telefono\" value=\"$telefono\" type=\"text\">"; ?>
            </div>
            <div class="caja web-70">
              <label>Comuna residencia</label>
              <select name="comuna" class="sel">
                <option>Arica</option>
                <option>Iquique</option>
                <option>...</option>
              </select>
            </div>
          </fieldset>
          <fieldset class="Cacceso">
            <h1>Cuenta de acceso</h1>
            <div class="caja web-100">
              <label>Correo electrónico</label>
              <?php echo "<input name=\"email\" value=\"$email\" type=\"text\">"; ?>
            </div>
            <div class="caja web-50">
              <label>Contraseña</label>
              <?php echo "<input name=\"password\" value=\"$password\" type=\"text\">"; ?>
            </div>
            <div class="caja web-50">
              <label>Confirmar contraseña</label>              
			  <?php echo "<input name=\"reTypePass\" value=\"$password\" type=\"text\">"; ?>
            </div>
          </fieldset>
          <fieldset class="Cacceso">
            <h1>Temas de interés</h1>
            <div class="caja web-100">
              <label>Indica las palabras que describen tus intereses. Sepáralas con coma para identificarlas mejor:</label>
              <?php echo "<textarea name=\"temas_intereses\">$temas_interes</textarea>"; ?>
            </div>
          </fieldset>
          <button type="submit">Guardar</button>
        </form>
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