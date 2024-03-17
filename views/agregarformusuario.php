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
   <?php['idUser'];
   $resultado=$conexion->query($sql);
   $row=$resultado-> fetch_assoc();
          include_once("conxion.php");
          $sql="SELECT*FROM usuarios=".$_REQUEST
       <label>Nombre:</label>
       <input type="date" name="nombre" 
       <br>
       <br>
       <label>Motivo cita:</label>
       <input type="text" name="motivo_cita" required>
       <br>
       <br>
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
      <input type="submit" value="Agregar cita">
      <a href="administracion_citas.php">Regresar</a>
    </div>
    </form>
    <footer>
        <br>
        <p> Pie de página &copy; <?php echo date("Y"); ?></p>
    </footer>
</body>
</html>