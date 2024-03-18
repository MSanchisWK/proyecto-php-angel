<?php
require_once '../controllers/users.controller.php';
session_start();
if (!$_SESSION['userId'] || !$_SESSION['admin']) {
    header("Location: index.php");
    exit();
}
$mensaje = "";
$usuariosController = new UsuariosController(); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mensaje = $usuariosController->registrarUsuario();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuaruos - ADMIN</title>
    <link rel="stylesheet" href="../css/estilo_plantilla.css" type="text/css">
    <link rel="stylesheet" href="../css/menu.css" type="text/css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <h1 class="center">Agregar usuario</h1>
    <div>
        <form action="" method="POST">
            <label>Nombre:</label>
            <input type="text" name="nombre" required>
            <label>Apellidos:</label>
            <input type="text" name="apellidos" required>
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Teléfono:</label>
            <input type="text" name="telefono" required>
            <label>Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" required>
            <label>Dirección:</label>
            <input type="text" name="direccion" required>
            <label>Contraseña</label>
            <input type="password" name="password">
            <label>Sexo:</label>
            <select name="sexo" required>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Otro">Otro</option>
            </select>
            <label>Rol:</label>
            <select name="rol" required>
                <option value="Admin">Admin</option>
                <option value="Usuario">Usuario</option>
            </select>
            <div class="enviar">
                <input type="submit" value="Agregar usuario">
            </div>
        </form>
        <p><?php echo $mensaje; ?></p>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
