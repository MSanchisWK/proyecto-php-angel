<?php
require_once "../connection.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
	<link rel="stylesheet" href="../css/estilo_plantilla.css" TYPE="text/css">
    <link rel="stylesheet" href="../css/menu.css" TYPE="text/css">	
</head>
<body>
    <?php include 'navbar.php'; ?>
    <main>
	     <form method="post">      
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
<?php include 'footer.php'; ?>
</html>