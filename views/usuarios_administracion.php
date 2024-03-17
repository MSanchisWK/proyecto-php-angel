<?php
$idUser = $_GET['idUser'];
?>
<?php
           require_once("conexion.php");
?>
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
			<li><a href="menu_administrador.php">INDEX</a></li>
			<li><a href="listado_noticias_administracion.php">NOTICIAS</a></li>
			<li><a href="menu_administrador.php" id="registro">USUARIOS-ADMINISTRACION</a></li>			
			<li><a href="administracion_citaciones.php">CITACIONES-ADMINISTRACION</a></li>
			<li><a href="listado_noticias_administracion_crud.php">NOTICIAS-ADMINISTRACION</a></li>
<a><li><a href="modificar_perfil.php?idUser=<?=$idUser?>">PERFIL</a></li>
            <li><a href="cerrar_sesion.php">CERRAR SESION</a></li>						
			
		</ul>
	    </nav>
       </div>
    </header>
<br>
<br>
<div> <a href="registro_usuario_administrador.php">Agregar usuario</a></div> 
<?php
require ("conexion.php");
$sql = $conexion->query("SELECT * FROM users_data INNER JOIN users_login ON users_data.idUser=users_login.idUser");

while($resultado=$sql->fetch_assoc()){
?>
     <table> 
       <tr><td>Nombre:</td><td><?php echo $resultado['nombre']?></td></tr>
       <tr><td>Apellidos:</td><td><?php echo $resultado['apellidos']?></td></tr>
       <tr><td>Email:</td><td><?php echo $resultado['email']?></td></tr>
       <tr><td>Telefono:</td><td><?php echo $resultado['telefono']?></td><td><a href="form_edit.php?idUser=<?php echo $resultado['idLogin']?>">Editar usuario</a></td></tr>
       <tr><td>Fecha nacimiento:</td><td><?php echo $resultado['fecha_nacimiento']?></td><td><a href="">Eliminar usuario</a></td></tr>
       <tr><td>Direccion:</td><td><?php echo $resultado['direccion']?></td></tr>
       <tr><td>Sexo:</td><td><?php echo $resultado['sexo']?></td></tr>
       <tr><td>Usuario:</td><td><?php echo $resultado['usuario']?></td></tr>
       <tr><td>Password:</td><td><?php echo $resultado['password']?></td></tr>
       <tr><td>Rol:</td><td><?php echo $resultado['rol']?></td></tr>
       <br>
       <br>
<?php
}
?>
       </table>  
       <br>
       <br>
<footer>
        <br>
        <p> Pie de página &copy; <?php echo date("Y"); ?></p>
</footer>
</body>
</html>