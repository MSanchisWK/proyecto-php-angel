<!-- cabecera.php -->
<!DOCTYPE html>
<html lang="es">
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
    <header>        
		<img  src="../img/banner-902589_1920.jpg">        
		<!-- Menu de navegacion -->
        <div class="menu">
         <!--Barra de navegacion-->
        <nav>
            <!--Opciones barra de navegacion-->
		    <ul>
			<li><a href="menu_usuario.php">INDEX</a></li>
			<li><a href="listado_noticias_usuario.php">NOTICIAS</a></li>
			<li><a href="citaciones.php" id="citaciones">CITACIONES</a></li>	
			<li><a href="modificar_perfil.php?idUser=<?=$idUser?>">PERFIL</a></li>
			<li><a href="cerrar_sesion.php">CERRAR SESION</a></li>
 				
			
		</ul>
	    </nav>
       </div>
    </header>
<br>
<br>
<h3>Listado de noticias</h3>
<?php
require ("conexion.php");
$sql = $conexion->query("SELECT * FROM users_login INNER JOIN noticias ON users_login.idUser = noticias.idUser;");

while($resultado=$sql->fetch_assoc()){
?>   
     
     <table> 
       <tr><td>Titulo:</td><td><?php echo $resultado['titulo']?></td></tr>
       <tr><td>Fecha:</td><td><?php echo $resultado['fecha']?></td></tr>
       <tr><td>Texto:</td><td><?php echo $resultado['texto']?></td></tr>
       <tr><td>Imagen:</td><td><?php echo $resultado['imagen']?></td></tr> 
       <tr><td>Usuario:</td><td><?php echo $resultado['usuario']?></td></tr>
       <br>
   
<?php
}
?>
       </table>    
       <br>
       <br>
<footer>
      <br>
      <p>Pie de página &copy; <?php echo date("Y"); ?></p>
</footer>

</body>
</html>