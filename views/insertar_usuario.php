<?php
    // Validate password
     
      require_once ("config.php");
    $user = "root"; 
    //$pass = "2001_1973_1974";
    $pass = "2001_1973_1974";
    $server = "localhost"; 
    $db = "proyecto";

    // Crear una nueva conexión
    $conexion = new mysqli($server, $user, $pass, $db);

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    } 
	  
     
     $nombre=$apellidos=$email=$telefono=$fecha_nacimiento=$direccion=$sexo=$idUser=$usuario = $password = $rol= "";
     $nombre_err=$apellidos_err=$email_err=$telefono_err=$fecha_nacimiento_err=$direccion_err=$sexo_err=$idUser_err=$usuario_err = $password_err = $rol_err= "";
     
    
      $nombre = $_POST['nombre'];
      $apellidos = $_POST['apellidos'];
      $email = $_POST['email'];
      $telefono = $_POST['telefono'];
      $fecha_nacimiento = $_POST['fecha_nacimiento'];
      $direccion = $_POST['direccion'];
      $sexo = $_POST['sexo'];
            
	  // Comprobar si ya esta dado de alta el Usuario
			
	  $sql = "SELECT COUNT(*) as encontrado  FROM users_data WHERE nombre ='$nombre' and apellidos ='$apellidos'";
	  // Ejecutar la consulta
      $resultado = $conexion->query($sql);			
	  if ($resultado) {
        // Obtener el resultado como un array asociativo
        $id = $resultado->fetch_assoc();			
		// Controlar en no_data_found 
		$variable = isset($id['encontrado']) ? $id['encontrado'] : '0';					
		// ya existe
        if ( $variable == 1){
                $mensajeError = "El usuario ya esta dado de alta";
                echo '<div style="color: red; font-weight: bold;">' . $mensajeError . '</div>';	
	            header("refresh:10;login.php");						  
                exit();  
		
		} else{
			
			
			// Insertar datos en la tabla de usuarios
			$sqlUsuario = "INSERT INTO users_data (nombre, apellidos, email, telefono, fecha_nacimiento, direccion, sexo) 
			        VALUES ('$nombre','$apellidos','$email','$telefono','$fecha_nacimiento','$direccion','$sexo')";
            
            if ($conexion->query($sqlUsuario) === TRUE) {
               $usuario_id = $conexion->insert_id;
   
               // Insertar datos en la tabla users_login
			  $idUser = $usuario_id;
              $usuario = $_POST['usuario'];
              $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Creates a password hash
			  			  
              $rol = $_POST['rol'];			  	  
			  
              $sqlLogin = "INSERT INTO users_login (idUser,usuario,password,rol) VALUES ('$idUser','$usuario','$password','$rol')";
              if ($conexion->query($sqlLogin) === TRUE) {
                   echo "Datos insertados correctamente.";
                   //$loginMsg="Usuario: Inicio sesión con éxito";	
	            header("refresh:6;usuarios_administracion.php");						  
                exit();
              } else {
                  echo "Error al insertar datos en la tabla de login: " . $conexion->error;
              }
          } else {
               echo "Error al insertar datos en la tabla de usuarios: " . $conexion->error;
          }

        }
	  }		
	    // Cerrar la conexión
        $conexion->close();	


