<?php
if (!$_SESSION['userId']) {
    header("Location: index.php");
    exit();
}
require_once '../controllers/UsuariosController.php';
require_once '../connection.php';
$usuariosController = new UsuariosController($db);
$usuario = $usuariosController->obtenerDatosUsuario($_SESSION['userId']); 
$mensaje = '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/estilo_plantilla.css" TYPE="text/css">
    <link rel="stylesheet" href="../css/menu.css" TYPE="text/css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <h1 align="center">Perfil de Usuario</h1>
    <div>
        <form action="" method="POST">
            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $usuario['nombre']; ?>" required><br>
            <label>Apellidos:</label>
            <input type="text" name="apellidos" value="<?php echo $usuario['apellidos']; ?>" required><br>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required><br>
            <label>Teléfono:</label>
            <input type="text" name="telefono" value="<?php echo $usuario['telefono']; ?>" required><br>
            <label>Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" value="<?php echo $usuario['fecha_nacimiento']; ?>" required><br>
            <label>Dirección:</label>
            <input type="text" name="direccion" value="<?php echo $usuario['direccion']; ?>" required><br>
            <label>Nombre de Usuario:</label>
            <input type="text" name="username" value="<?php echo $usuario['username']; ?>" readonly><br>
            <label>Contraseña:</label>
            <input type="password" name="password" placeholder="Nueva contraseña"><br>
            <input type="submit" value="Guardar Cambios">
        </form>
        <div><?php echo $mensaje; ?></div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>