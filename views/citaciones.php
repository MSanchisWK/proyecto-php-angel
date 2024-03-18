<?php
session_start();
require_once '../controllers/citas.controller.php';
if (!$_SESSION['userId']) {
    header("Location: index.php");
    exit();
}
$citasController = new CitasController();
$citas = $citasController->obtenerCitasDeUsuario($_SESSION['userId']);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mensaje = $citasController->crearCita($_SESSION['userId'],$_POST['fecha_cita'],$_POST['motivo_cita']);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citaciones</title>
    <link rel="stylesheet" href="../css/estilo_plantilla.css" TYPE="text/css">
    <link rel="stylesheet" href="../css/menu.css" TYPE="text/css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <h1 class="center">Gestión de Citaciones</h1>
    <h2 class="center">Solicitar Cita</h2>
    <form action="" method="POST">
        <label>Fecha de Cita:</label>
        <input type="date" name="fecha_cita" required>
        <label>Motivo de la Cita:</label>
        <input type="text" name="motivo_cita" required>
        <div align="center">
            <input type="submit" value="Solicitar Cita">
        </div>
    </form>
    <h2 class="center">Mis Citas Planificadas</h2>
    <table>
        <tr>
            <th>Fecha de Cita</th>
            <th>Motivo de la Cita</th>
        </tr>
        <?php  
        foreach ($citas as $cita) {
            echo '<tr>';
            echo '<td>' . $cita['fecha_cita'] . '</td>';
            echo '<td>' . $cita['motivo_cita'] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>
    <?php include 'footer.php'; ?>
</body>
</html>
