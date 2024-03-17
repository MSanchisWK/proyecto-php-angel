<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<link REL="stylesheet" HREF="../css/estilo_plantilla.css" TYPE="text/css">
<link REL="stylesheet" HREF="../css/menu.css" TYPE="text/css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 600px; padding: 20px; margin-left:400px;}
    </style>
    
</head>
<body>
    <header>        
		<img  src="../img/banner-902589_1920.jpg">        
		<!-- Menu de navegacion -->
      
         <div class="menu">
         <!--Barra de navegacion-->
        <br>
        <nav>
                <!--Opciones barra de navegacion-->
		    <ul>
			  <li><a href="menu_usuario.php" id="pagina_inicio">INICIO</a></li>
			  <li><a href="listado_noticias.php" id="noticias">NOTICIAS</a></li>
			  <li><a href="registro.php" id="registro">REGISTRO</a></li>			  
			  <li><a href="login.php" id="login">LOGIN</a></li>
		    </ul>
       </nav>
       </div>
    </header>
    <div class="wrapper">
        <h2>Registro</h2>
        <p>Por favor complete este formulario para crear una cuenta.</p>
        
        <form action="insertar_usuario.php" method="post">

            <div>
                <label>Nombre</label>
                <input type="text" name="nombre" required>
            </div>
            <br>
            <div>
                <label>Apellidos</label>
                <input type="text" name="apellidos" required>
               
            </div>
            <br>
            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <br>
            <div>
                <label>Telefono</label>
                <input type="text" name="telefono" required>
            </div>
            <br>
            <div>
                <label>Fecha nacimiento</label>
                <input type="date" name="fecha_nacimiento" required>
            </div>
            <br>
            <div>
                <label>Direccion</label>
                <input type="text" name="direccion" required>
            </div>
            <br>
            <div>
                <label>Sexo</label>
              <select name="sexo">
              <option value="" selected="selected">Selecccione sexo</option>
              <option value="hombre">Hombre</option>  
              <option value="mujer">Mujer</option>
              </select>
            </div>
            <br>
            <div>
                <label>Usuario</label>
                <input type="text" name="usuario">
            </div>
            <br>    
            <div>
                <label>Contraseña</label>
                <input type="text" name="password">
            </div>
            <br>
            <div>
              <label>Rol</label>
              <input type="text" value="user" name="rol"> 
              <!--<select class="form-control" name="rol">-->
              <!--<option value="" selected="selected">Selecccione rol</option>-->
              <!--<option value="admin">Admin</option>-->  
              <!--<option value="user">Usuario</option>-->
              </select>
              <!--<span class="help-block"><?php echo $password_err; ?></span>-->
            </div>           

            </div>
            <br>
            <div align="center">
                <input type="submit" class="btn btn-primary" value="Registrarse">
            </div>
            <br>
            <p align="center">¿Ya tienes una cuenta? <a href="login.php">Inicia sesion aquí</a></p>
            <br>
            <br>
            <br>
            <br>
           
        </form>
        
    </div>    
<footer>
         
        <p> Pie de página &copy; <?php echo date("Y"); ?></p>
</footer>
</body>
</html>