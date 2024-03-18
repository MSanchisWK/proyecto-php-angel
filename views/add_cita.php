<?php
require_once '../controllers/citas.controller.php';
require_once '../controllers/users.controller.php';
session_start();
if (!$_SESSION['userId'] || !$_SESSION['admin']) {
    header("Location: index.php");
    exit();
}
$usersController = new UsuariosController();
$users = $usersController->obtenerTodosLosUsuarios();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas - ADMIN</title>
	<link rel="stylesheet" href="../css/estilo_plantilla.css" type="text/css">
    <link rel="stylesheet" href="../css/menu.css" type="text/css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <h1 class="center">Agregar cita</h1>
    <form action="" method="POST">
       <label>Fecha cita:</label>
       <input type="date" name="fecha_cita" required>
       <label>Motivo cita:</label>
       <input type="text" name="motivo_cita" required>
       <label>Usuario:</label>
       <?php
        echo "<select name='idUser'>";
        foreach ($users as $user) {
            echo "<option value='".$user['idUser']."'>". $user['nombre']."</option>"; 
        }
        ?>
       </select>
    <div class="enviar">
      <input type="submit" value="Agregar cita">
    </div>
    </form>
    <?php include 'footer.php'; ?>
</body>
</html>