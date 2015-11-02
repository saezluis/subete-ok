<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Inicio / Qué es Súbete</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximun-scale=1">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="js/scripts-min.js"></script>
	
	<script type="text/javascript">
	
	// <![CDATA[
	function showYouTubeThumbnails(data) {
		/** USER SETTINGS ***********/
		var highResThumbnails = false;			// set to false for normal (120px x 90px), set to true for high-resolution (320px x 240px)
		var targetId = "videos";					// Id of element where the thumbnails will be inserted
		/******************************/

		var feed = data.feed;
	 	var entries = feed.entry || [];
	 	var targetObj = document.getElementById(targetId);

	 	for (var i = 0; i < entries.length; i++) {
	    		var entry = entries[i];
	    		var link = entry['link'][0]['href'];
	    		var thumbnailUrl;
			var thumbnailWidth;
			var thumbnailHeight;
			var minimumHighResWidth = 320;	// minimum width for a high-resolution thumbnail

			var thumbnailsObj = entry['media$group']['media$thumbnail'];
			for (var j = 0; j < thumbnailsObj.length; j++) {
				thumbnailUrl = thumbnailsObj[j]['url'];
				thumbnailWidth = thumbnailsObj[j]['width'];
				thumbnailHeight = thumbnailsObj[j]['height'];
				if (thumbnailsObj[j]['width'] >= minimumHighResWidth && highResThumbnails || thumbnailsObj[j]['width'] < minimumHighResWidth && !highResThumbnails) {
					break;
				}
			}

	    		var newA = document.createElement('a');
	    		newA.href = link;
	    		newA.title = "YouTube video";

	    		var newImg = document.createElement('img');
	    		newImg.src = thumbnailUrl;
	    		newImg.width = thumbnailWidth;
	    		newImg.height = thumbnailHeight;
	    		newImg.alt = "YouTube video thumbnail";
			newA.appendChild(newImg);

	    		targetObj.appendChild(newA);
	  	}
	}
	// ]]>
	
	</script>
	
	
	<script type="text/javascript">
	
	jQuery(document).ready(function($){

		$('iframe[src*="youtube.com"]').each(function() {
			var url = $(this).attr("src")
			$(this).attr("src",url+"&amp;wmode=transparent")
		}); 

	});
	
	</script>
	
		
	
	<!-- This loads the YouTube IFrame Player API code -->
<script src="http://www.youtube.com/player_api"></script>
	
  </head>
  <body>
    <header class="grupo">
      <div class="caja base-100">
        <div id="logo"><a href="index.html"><img src="img/logo.png"></a></div>
        <div id="logo_royal"><a href="http://www.royalrental.cl" target="_blank" alt="Royal Rental"><img src="img/logo_royal.jpg"></a></div>
        <div id="admin-header">
          <div id="admin--data"><img src="img/user.jpg" class="circulo"><span class="nombre_usuario">Jorge Ortiz L.</span></div>
          <div id="cuenta">
            <ul>
              <li><a href="mi-cuenta.html" class="micuenta">Mi cuenta</a></li>
              <li><a href="#" class="cerrar">Cerrar</a></li>
            </ul>
          </div>
        </div>
      </div>
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
	
	<?php
	//echo $recurso;
	
	if(@$_REQUEST['video1'] != ''){
		$recurso = @$_REQUEST['video1'];	
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
			echo "<div class=\"caja web-25\"><button name=\"video1\" value=\"https://www.youtube.com/embed/dq5TWOYS2G8\" type=\"submit\"><img src=\"img/video0.jpg\"></button></div>";
			echo "<div class=\"caja web-25\"><button name=\"video1\" value=\"https://www.youtube.com/embed/QIowq_0xjvw\" type=\"submit\"><img src=\"img/video1.jpg\"></button></div>";
			echo "<div class=\"caja web-25\"><img src=\"img/poster.jpg\"></div>";
			echo "<div class=\"caja web-25\"><img src=\"img/poster.jpg\"></div>";
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

  
