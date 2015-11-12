<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Encuesta / Súbete</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximun-scale=1">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="js/scripts-min.js"></script>
	
	<script type="text/javascript">
    
	// -- Pregunta 1 --
	function preguntaRockSi(){
				
		var node = document.getElementById('RockSi');
        if(node.style.display == '') {
          node.style.display='none';
        }
        else {
          node.style.display = '';
        }
	}
	
	function preguntaRockNo(){
				
		var node = document.getElementById('RockNo');
        if(node.style.display == '') {
          node.style.display='none';
        }
        else {
          node.style.display = '';
        }
	}
	
	// -- Pregunta 2 --
	function preguntaPopSi(){
				
		var node = document.getElementById('PopSi');
        if(node.style.display == '') {
          node.style.display='none';
        }
        else {
          node.style.display = '';
        }
	}
	
	function preguntaPopNo(){
				
		var node = document.getElementById('PopNo');
        if(node.style.display == '') {
          node.style.display='none';
        }
        else {
          node.style.display = '';
        }
	}
	
	// -- Pregunta 3 --
	
	function preguntaCumbiaSi(){
				
		var node = document.getElementById('CumbiaSi');
        if(node.style.display == '') {
          node.style.display='none';
        }
        else {
          node.style.display = '';
        }
	}
	
	function preguntaCumbiaNo(){
				
		var node = document.getElementById('CumbiaNo');
        if(node.style.display == '') {
          node.style.display='none';
        }
        else {
          node.style.display = '';
        }
	}
	
	// -- Pregunta 4 --
	
	function preguntaBaladaSi(){
				
		var node = document.getElementById('BaladaSi');
        if(node.style.display == '') {
          node.style.display='none';
        }
        else {
          node.style.display = '';
        }
	}
	
	function preguntaBaladaNo(){
				
		var node = document.getElementById('BaladaNo');
        if(node.style.display == '') {
          node.style.display='none';
        }
        else {
          node.style.display = '';
        }
	}
	
	// -- Pregunta 5 --
	
	function preguntaJazzSi(){
				
		var node = document.getElementById('JazzSi');
        if(node.style.display == '') {
          node.style.display='none';
        }
        else {
          node.style.display = '';
        }
	}
	
	function preguntaJazzNo(){
				
		var node = document.getElementById('JazzNo');
        if(node.style.display == '') {
          node.style.display='none';
        }
        else {
          node.style.display = '';
        }
	}
	
	</script>
	
  </head>
  <body>
	
	
    <div id="strip"></div>
    <header class="grupo">
      <div class="caja base-100">
        <div id="logo"><a href="#"><img src="img/logo.png"></a></div>
        <div id="logo_royal"><a href="#" alt="Royal Rental"><img src="img/logo_royal.jpg"></a></div>
      </div>
    </header>
    <section class="grupo">
      <div id="preguntas">
        <h1>Tu opinión es muy importante para nosotros.</h1>
        <form id="encuesta" method="post" action="procesar-encuesta.php">
		
		  <!--	
			
          <article class="color1"> 
            <p> <span>1</span>¿Te parece relevante la propuesta del programa súbete?</p>			
            <div class="caja">
			<input type="radio" id="radioPreg1" name="radioRockSi" value="si" hidden=hidden>
				<a href="javascript:;" class="btn--enc" onclick="$('#radioPreg1').prop('checked', !($('#radioPreg1').is(':checked'))); preguntaRockSi();"> SI 
					<div  id="palomita">
						<img id="RockSi" style="display:none;" src="img/check.png">
					</div>
				</a>			
            </div>			
            <div class="caja">
			<input type="radio" id="radioPreg2" name="radioRockNo" value="no" hidden=hidden>
				<a href="javascript:;" class="btn--enc" onclick="$('#radioPreg2').prop('checked', !($('#radioPreg2').is(':checked'))); preguntaRockNo();"> NO
					<div id="palomita">
						<img id="RockNo" style="display:none;" src="img/check.png">
					</div>
				</a>
            </div>
          </article>
		  
          <article class="color2">
            <p> <span>1</span>¿Consideras que los pilares de nuestro programa ayudan a superarte en tu espacio laboral?</p>
            <div class="caja">
			<input type="radio" id="radioPreg3" name="radioPopSi" value="si" hidden=hidden>
				<a href="javascript:;" class="btn--enc" onclick="$('#radioPreg3').prop('checked', !($('#radioPreg3').is(':checked'))); preguntaPopSi();"> SI 
					<div id="palomita">
						<img id="PopSi" style="display:none;" src="img/check.png">
					</div>
				</a>
            </div>
            <div class="caja">
			<input type="radio" id="radioPreg4" name="radioPopNo" value="no" hidden=hidden>
				<a href="javascript:;" class="btn--enc" onclick="$('#radioPreg4').prop('checked', !($('#radioPreg4').is(':checked'))); preguntaPopNo();"> NO
					<div id="palomita">
						<img id="PopNo" style="display:none;" src="img/check.png">
					</div>
				</a>
            </div>
          </article>
		  
          <article class="color3">
            <p> <span>3</span>¿Te parece interesante tener una jornada de reconocimiento para los operadores?</p>
            <div class="caja">
			<input type="radio" id="radioPreg5" name="radioCumbiaSi" value="si" hidden=hidden>
				<a href="javascript:;" class="btn--enc" onclick="$('#radioPreg5').prop('checked', !($('#radioPreg5').is(':checked'))); preguntaCumbiaSi();"> SI 
					<div id="palomita">
						<img id="CumbiaSi" style="display:none;" src="img/check.png">
					</div>
				</a>
            </div>
            <div class="caja">
			<input type="radio" id="radioPreg6" name="radioCumbiaNo" value="no" hidden=hidden>
				<a href="javascript:;" class="btn--enc" onclick="$('#radioPreg6').prop('checked', !($('#radioPreg6').is(':checked'))); preguntaCumbiaNo();"> NO
					<div id="palomita">
						<img id="CumbiaNo" style="display:none;" src="img/check.png">
					</div>
				</a>
            </div>
          </article>
		  
          <article class="color4">
            <p> <span>4</span>¿Ha sido de tu agradado participar en esta jornada?</p>
            <div class="caja">
			<input type="radio" id="radioPreg7" name="radioBaladaSi" value="si" hidden=hidden>
				<a href="javascript:;" class="btn--enc" onclick="$('#radioPreg7').prop('checked', !($('#radioPreg7').is(':checked'))); preguntaBaladaSi();"> SI 
					<div id="palomita">
						<img id="BaladaSi" style="display:none;" src="img/check.png">
					</div>
				</a>
            </div>
            <div class="caja">
			<input type="radio" id="radioPreg8" name="radioBaladaNo" value="no" hidden=hidden>
				<a href="javascript:;" class="btn--enc" onclick="$('#radioPreg8').prop('checked', !($('#radioPreg8').is(':checked'))); preguntaBaladaNo();"> NO
					<div id="palomita">
						<img id="BaladaNo" style="display:none;" src="img/check.png">
					</div>
				</a>
            </div>
          </article>
		  
          <article class="color5">
            <p> <span>5</span>¿Participarías en las próximas versiones de esta jornada?</p>
            <div class="caja">
			<input type="radio" id="radioPreg9" name="radioJazzSi" value="si" hidden=hidden>
				<a href="javascript:;" class="btn--enc" onclick="$('#radioPreg9').prop('checked', !($('#radioPreg9').is(':checked'))); preguntaJazzSi();"> SI
					<div id="palomita">
						<img id="JazzSi" style="display:none;" src="img/check.png">
					</div>
				</a>
            </div>
            <div class="caja">
			<input type="radio" id="radioPreg10" name="radioJazzNo" value="no" hidden=hidden>
				<a href="javascript:;" class="btn--enc" onclick="$('#radioPreg10').prop('checked', !($('#radioPreg10').is(':checked'))); preguntaJazzNo();"> NO
					<div id="palomita">
						<img id="JazzNo" style="display:none;" src="img/check.png">
					</div>
				</a>
            </div>
          </article>
		  
		  
		  <article class="color2">
            <p> <span>6</span>En una escala de 1 a 7 con qué nota calificaria el evento.</p>
            <div class="caja">											
				
				<p>	1  <input type="radio" name="escala" value="1"> 2  <input  type="radio" name="escala" value="2"> 3  <input  type="radio" name="escala" value="3"> 4  <input  type="radio" name="escala" value="4"> 5  <input  type="radio" name="escala" value="5"> 6  <input  type="radio" name="escala" value="6"> 7  <input  type="radio" name="escala" value="7"></p>
				
            </div>
			<!--
            <div class="caja">
			<input type="radio" id="radioPreg12" name="radioJazzNo" value="no" hidden=hidden>
				<a href="javascript:;" class="btn--enc" onclick="$('#radioPreg12').prop('checked', !($('#radioPreg12').is(':checked'))); preguntaClubNo();"> NO
					<div id="palomita">
						<img id="JazzNo" style="display:none;" src="img/check.png">
					</div>
				</a>
            </div>
			
          </article>
		  
		  -->
		  
		  <h3>Muy pronto tendremos una nueva encuesta para saber en qué podemos mejorar.</h3>
		  
		  <div id="royalito-check"><img src="img/royalito.png"></div>
				

          
		  
		  <button type="submit" onclick="goBack()">Volver</button>

		  <script>
			function goBack() {
				window.history.back();
			}
		  </script>
		  
        </form>
      </div>
    </section>
  </body>
</html>