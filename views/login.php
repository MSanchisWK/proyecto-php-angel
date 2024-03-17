<?php

// Initialize the session
session_start();

// Include config file
require_once "conexion.php";
	
// Define variables and initialize with empty values
$nombre=$apellidos=$email=$telefono=$fecha_nacimiento=$direccion=$sexo=$usuario = $password = $rol = "";
$nombre_err=$apellidos_err=$email_err=$telefono_err=$fecha_nacimiento_err=$direccion_err=$sexo_err=$usuario_err = $password_err = $rol_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
     
    // Check if usuario is empty
    if(empty(trim($_POST["usuario"]))){
        $usuario_err = "Por favor ingrese usuario.";
    } else{
        $usuario = trim($_POST["usuario"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingrese su contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Check if rol is empty
    if(empty(trim($_POST["rol"]))){
        $rol_err = "Por favor ingrese su rol.";
    } else{
        $rol = trim($_POST["rol"]);
    }


    // Validate credentials
    if(empty($usuario_err) && empty($password_err) && empty($rol_err)){
        
		$usuario = $_POST["usuario"];	
		$password = $_POST['password'];	
        $rol = $_POST["rol"];
		
		//$sql = "SELECT password, COUNT(*) as encontrado  FROM users_login WHERE usuario ='$usuario' and password ='$password' and rol ='$rol'";
		$sql = "SELECT password, idUser, COUNT(*) as encontrado  FROM users_login WHERE usuario ='$usuario' and rol ='$rol' GROUP BY password, idUser;";
		
		
		// Ejecutar la consulta
        $resultado = $conexion->query($sql);	
		
	    // Verificar si la consulta fue exitosa
	    if ($resultado) {
            // Obtener el resultado como un array asociativo
            $id = $resultado->fetch_assoc();
			
			// Controlar en no_data_found 
			$variable = isset($id['encontrado']) ? $id['encontrado'] : '0';
			
			
			//if ( $id['encontrado']==1){	
			
            if ( $variable == 1){	
			
			   $hashAlmacenado = $id['password'];
			   // Validar la contraseña introducida con la contraseña de BD
		       if (password_verify($password, $hashAlmacenado)) {
                  //echo "Contraseña válida";
				  //session_start();
                  $_SESSION["usuarios_login"]=$usuario;
                  $_SESSION["idUser"]=$id['idUser'];
                  $_SESSION["rol"]=$id['rol'];
				  if ( $rol == 'user'){
                     $url = 'menu_usuario.php?nombUser=' . urlencode($_SESSION["usuarios_login"]) . '&idUser=' . urlencode($_SESSION["idUser"]).  '&rol=' . urlencode($_SESSION["rol"]); 
				  }else{
				     $url = 'menu_administrador.php?nombUser=' . urlencode($_SESSION["usuarios_login"]) . '&idUser=' . urlencode($_SESSION["idUser"]) . '&rol=' . urlencode($_SESSION["rol"]);   	  
				  }     
				  
                  // Redirigir a la URL con header
                      header('Location: ' . $url);
					  
                      //$loginMsg="Usuario: Inicio sesión con éxito";
                      echo "<h2 align='center'>Inicio de sesión con éxito</h2>";	
	              //header("refresh:5;index.php");						  
                  exit();   
				  
               } else {                  
				  $mensajeError = "Credenciales incorrectas";
                  echo '<div style="color: red; font-weight: bold;">' . $mensajeError . '</div>';
		       }	
			  
			  
			}else{				
              $mensajeError = "Usuario no existe";
              echo '<div style="color: red; font-weight: bold;">' . $mensajeError . '</div>';
			  header("refresh:5;registro.php");			  			  
              exit();   
            }
		} else {
           // Mostrar un mensaje de error si la consulta falla
           //echo "Error en la consulta: " . $conexion->error;
		    $mensajeError = "Usuario/Rol incorrectos";
            echo '<div style="color: red; font-weight: bold;">' . $mensajeError . '</div>';
        }

        // Cerrar la conexión
        $conexion->close();
	}else{
		$mensajeError = "Credenciales incorrectas";
        echo '<div style="color: red; font-weight: bold;">' . $mensajeError . '</div>';
	}		
}
?>

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
			  <li><a href="../index.html" id="pagina_inicio">INICIO</a></li>
			  <li><a href="listado_noticias.php" id="noticias">NOTICIAS</a></li>
			  <li><a href="registro.php" id="registro">REGISTRO</a></li>			  
			  <li><a href="login.php" id="login">LOGIN</a></li>
		    </ul>
	    </nav>
       </div>
    </header>
    <main>
	
	     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">      
            <h2>Login</h2>
            <p>Por favor, complete sus credenciales para iniciar sesión.</p>
            <div class="form-group <?php echo (!empty($usuario_err)) ? 'has-error' : ''; ?>">
                <label>Usuario</label>
                <input type="text" name="usuario" class="form-control">
                <span class="help-block"><?php echo $usuario_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Seleccione rol</label> 
                <select class="form-control" name="rol">
                    <option value="" selected="selected"> </option>
                    <option value="admin">admin</option>  
                    <option value="user">user</option>
                </select>
            </div>           
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Inicia sesion">
            </div>
            <p>¿No tienes una cuenta? <a href="registro.php">Regístrate ahora</a>.</p>
        </form>
       
    </main>
</body>
<footer>
        <p>Pie de página &copy; <?php echo date("Y"); ?></p>
</footer>
</html>