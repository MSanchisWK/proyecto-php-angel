<?php
require_once '../controllers/citas.controller.php';
session_start();
if (!$_SESSION['userId'] || !$_SESSION['admin']) {
    header("Location: index.php");
    exit();
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas - ADMIN</title>
	<link rel="stylesheet" href="../css/estilo_plantilla.css" TYPE="text/css">
    <link rel="stylesheet" href="../css/menu.css" TYPE="text/css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <h1 align="center">Agregar cita</h1>
    <form action="" method="POST">
       <label>Fecha cita:</label>
       <input type="date" name="fecha_cita" required>
       <label>Motivo cita:</label>
       <input type="text" name="motivo_cita" required>
       <?php
        require_once 'UsuariosController.php';
        require_once 'connection.php';
        $usersController = new UsuariosController($db);
        $users = $usersController->obtenerTodosLosUsuarios();
        foreach ($users as $user) {
            echo "<option value='".$user['idUser']."'>". $user['usuario']."</option>"; 
        }
        ?>
       </select>
    <div align="center">
      <input type="submit" value="Agregar cita">
      <a href="administracion_citas.php">Regresar</a>
    </div>
    </form>
    <?php include 'footer.php'; ?>
</body>
</html>