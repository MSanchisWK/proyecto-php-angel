<?php
require_once "../controllers/users.controller.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuariosController = new UsuariosController();
    $usuariosController->iniciarSesion($_POST['usuario'],  $_POST['password']);
}
$mensaje = "";
if(isset($_GET['error'])){
    $mensaje = 'Usuario o contraseña incorrectos';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
	<link rel="stylesheet" href="../css/estilo_plantilla.css" type="text/css">
    <link rel="stylesheet" href="../css/menu.css" type="text/css">	
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
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control">
            </div>  
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Inicia sesion">
            </div>
            <div><?php echo $mensaje; ?></div>
            <p>¿No tienes una cuenta? <a href="registro.php">Regístrate ahora</a>.</p>
        </form>
    </main>
</body>
<?php include 'footer.php'; ?>
</html>