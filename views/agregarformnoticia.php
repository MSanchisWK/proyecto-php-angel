<html>
<head>
      <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de la página</title>
    <!-- Puedes agregar más etiquetas meta, enlaces a hojas de estilo, o scripts aquí -->
	<link REL="stylesheet" HREF="../css/estilo_plantilla.css" TYPE="text/css">
<link REL="stylesheet" HREF="../css/menu.css" TYPE="text/css">
    <style type="text/css">
     	
    </style>
</head>
<body>
   
    <!--Codigo javascript para pagina actual en menu de navegacion-->
    <script>
        window.onload = function()  {
            document.getElementById("pagina_inicio").style.color='aqua';
         }
    </script>
    <header>        
		<img  src="../img/banner-902589_1920.jpg">        
		<!-- Menu de navegacion -->
         <div class="menu">
         <!--Barra de navegacion-->
        <nav>
            <!--Opciones barra de navegacion-->
		    <ul>
			<li><a href="../index.php">INDEX</a></li>
			<li><a href="listado_noticias.php">NOTICIAS</a></li>
			<li><a href="usuarios_administracion.php" id="registro">USUARIOS-ADMINISTRACION</a></li>			
			<li><a href="citacionies_administracion.php">CITACIONES-ADMINISTRACION</a></li>
			<li><a href="noticias_administracion.php" id="index">NOTICIAS-ADMINISTRACION</a></li>
                        <li><a href="">PERFIL</a></li>
            <li><a href="cerrar_sesion.php">CERRAR SESION</a></li>						
			
		</ul>
	    </nav>
       </div>
    </header> 
    <br>
    <br>  
    <h1 align="center">Agregar noticias</h1>
   <form action="insertarnoticias.php" method="POST">
       <label>Titulo:</label>
       <input type="text" name="titulo" required>
       <br>
       <br>
       <label>Fecha:</label>
       <input type="date" name="fecha" required>
       <br>
       <br>
       <label>Texto:</label>
       <input type="text" name="texto" required>
       <br>
       <br>
       <label>Imagen:</label>
       <input type="text" name="imagen" required>
       <br>
       <br>
       <label>Usuario:</label>
       <select name="idUser">
       <option>--Seleccione usuario--</option> 
       <?php
        include ("conexion.php");
               $sql=$conexion->query("SELECT * FROM users_login");
               while ($resultado =$sql->fetch_assoc()) {
       echo "<option value='".$resultado['idUser']."'>". $resultado ['usuario']."</option>";
              
               }
        ?>
       </select>
       <br>
       <br>
       <br>
    <div align="center">
      <input type="submit" value="Agregar noticia">
      <a href="noticias_administracion.php">Regresar</a>
    </div>
    </form>
    <footer>
        <br>
        <p> Pie de página &copy; <?php echo date("Y"); ?></p>
    </footer>
</body>
</html>