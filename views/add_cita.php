<?php
require_once '../controllers/citas.controller.php';
require_once '../controllers/users.controller.php';

session_start();
if (!$_SESSION['userId'] || !$_SESSION['admin']) {
    header("Location: index.php");
    exit();
}

$usersController = new UsuariosController();
$citasController = new CitasController();

$edit = isset($_GET['edit']);
$accion = $edit ? 'Editar' : 'Agregar';
if ($edit) {
    $cita = $citasController->obtenerCitaPorId($_GET['edit']);
}
$users = $usersController->obtenerTodosLosUsuarios();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($edit){
        $citasController->actualizarCita($_GET['edit'], $_POST['idUser'], $_POST['fecha_cita'], $_POST['motivo_cita']);
    } else {
        $citasController->crearCita($_POST['idUser'], $_POST['fecha_cita'], $_POST['motivo_cita']);
    }
}
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
    <h1 class="center"><?php echo $accion; ?> cita</h1>
    <form action="" method="POST">
       <label>Fecha cita:</label>
    <input type="date" name="fecha_cita" value="<?php if ($edit) { echo $cita['fecha_cita']; } ?>" required>
       <label>Motivo cita:</label>
       <input type="text" name="motivo_cita" value="<?php if ($edit) { echo $cita['motivo_cita']; } ?>" required>
       <label>Usuario:</label>
       <select name='idUser' value="<?php if ($edit) { echo $cita['idUser']; } ?>">
       <?php
        foreach ($users as $user) {
            echo "<option value='".$user['idUser']."'>". $user['nombre']."</option>"; 
        }
        ?>
       </select>
    <div class="enviar">
      <input type="submit" value="Enviar">
    </div>
    </form>
    <?php include 'footer.php'; ?>
</body>
</html>