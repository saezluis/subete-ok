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
        <div id="logo"><a href="index.html"><img src="img/logo.png"></a></div>
        <div id="logo_royal"><a href="http://www.royalrental.cl" target="_blank" alt="Royal Rental"><img src="img/logo_royal.jpg"></a></div>
      </div>
    </header>
    <section class="grupo">
      <div id="preguntas">
        <h1>Encuesta satisfacción al cliente</h1>
        <form id="encuesta" method="post" action="procesar-encuesta.php">
		
          <article class="color1"> 
            <p> <span>1</span>¿Le gusta la el Rock?</p>			
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
            <p> <span>1</span>¿Le gusta el Pop?</p>
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
            <p> <span>3</span>¿Le gusta la cumbia?</p>
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
            <p> <span>4</span>¿Le gusta la balada?</p>
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
            <p> <span>5</span>¿Le gusta el jazz?</p>
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
		  
          <button type="submit">Enviar</button>
        </form>
      </div>
    </section>
  </body>
</html>