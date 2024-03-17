<!-- cabecera.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de la página</title>
    <!-- Puedes agregar más etiquetas meta, enlaces a hojas de estilo, o scripts aquí -->
     
	<link REL="stylesheet" HREF="css/estilo_plantilla.css" TYPE="text/css">
        <link REL="stylesheet" HREF="css/menu.css" TYPE="text/css">
       <style type="text/css">
          
        </style>	
</head>
<body>
    <!--Codigo javascript para pagina actual en menu de navegacion-->
 <script>
  window.onload = function()  {
   document.getElementById("pagina_inicio").style.color='red';
 }
</script>
    <header>        
		<img  src="img/banner-902589_1920.jpg">        
		<!-- Menu de navegacion -->
        <nav>
         <div class="menu">
         <!--Barra de navegacion-->
        
                <!--Opciones barra de navegacion-->
		    <ul>
			  <li><a href="index.php" id="pagina_inicio">INICIO</a></li>
			  <li><a href="views/listado_noticias.php" id="noticias">NOTICIAS</a></li>
			  <li><a href="views/registro.php" id="registro">REGISTRO</a></li>			  
			  <li><a href="views/login.php" id="login">LOGIN</a></li>
		    </ul>
	   
       </div>
         </nav>
    </header>
    <br>
    <br>
    <br>
    <main>
        <section>
                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc cursus elementum nulla a sodales. Mauris in maximus nibh, nec lobortis nisi. Integer malesuada sagittis ante et feugiat. Aenean nulla metus, pulvinar ultricies eros nec, ullamcorper scelerisque mi. Nullam lectus mi, commodo id maximus vitae, consequat at purus. Mauris in leo ac ex posuere varius. Curabitur sed elit vel ligula gravida pretium. Proin fringilla tempus vehicula. Ut tincidunt rutrum metus vitae imperdiet. Proin gravida auctor ex, imperdiet tincidunt arcu posuere eget. Phasellus hendrerit augue nulla. Morbi sodales, dolor sed rhoncus sodales, arcu urna vestibulum urna, et ullamcorper sem ex in massa. Maecenas ultricies lorem non nisi tristique consequat ac ac mauris.
        </section>
        <br>
              
        <section>
                <div align="center">
                <div class="galeria">
                           <img src="img/foto1.jpg" alt="" width="300" height="200"> 
                           <img src="img/foto2.jpg" alt="" width="300" height="200"> 
                           <img src="img/foto3.jpg" alt="" width="300" height="200">
                           <img src="img/foto4.jpg" alt="" width="300" height="200"> 
                </div>	
                </div>					   
        </section>
        <br>
        <br>
        <section>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc cursus elementum nulla a sodales. Mauris in maximus nibh, nec lobortis nisi. Integer malesuada sagittis ante et feugiat. Aenean nulla metus, pulvinar ultricies eros nec, ullamcorper scelerisque mi. Nullam lectus mi, commodo id maximus vitae, consequat at purus. Mauris in leo ac ex posuere varius. Curabitur sed elit vel ligula gravida pretium. Proin fringilla tempus vehicula. Ut tincidunt rutrum metus vitae imperdiet. Proin gravida auctor ex, imperdiet tincidunt arcu posuere eget. Phasellus hendrerit augue nulla. Morbi sodales, dolor sed rhoncus sodales, arcu urna vestibulum urna, et ullamcorper sem ex in massa. Maecenas ultricies lorem non nisi tristique consequat ac ac mauris.</p>
<br>
<br>
        </section>
        <section align="center"><p><a href="https://www.movistar.com">MOVISTAR</a> | <a href="https://www.renault.com">RENAULT</a> | <a href="https://www.vodafone.com">VODAFONE</a> | <a href="https://www.telepizza.es">TELEPIZZA</a> | <a href="https://www.volkswagen.com">VOLSKWAGEN</a> | <a href="https://www.orange.com">ORANGE</a></p></section>

       
    </main>
<br>
<br>
<br>
<br>
<footer>  
        <br>
        <p>Pie de página &copy; <?php echo date("Y"); ?></p>
</footer>
</body>
</html>