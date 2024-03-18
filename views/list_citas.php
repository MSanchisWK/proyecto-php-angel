<?php
require_once '../controllers/citas.controller.php';
session_start();
if (!$_SESSION['userId'] || !$_SESSION['admin']) {
    header("Location: index.php");
    exit();
}
$citasController = new CitasController();
$citas = $citasController->obtenerTodasLasCitas();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas - ADMIN</title>
    <link rel="stylesheet" href="../css/estilo_plantilla.css" type="text/css">
    <link rel="stylesheet" href="../css/menu.css" type="text/css">
</head> 
<body>
    <?php include 'navbar.php'; ?>
    <h5 class="center"><a href="./add_cita.php">Agregar cita</a></h5>
    <table> 
    <tr>
        <th>Usuario</th>
        <th>Fecha de cita</th>
        <th>Motivo</th>
    </tr>
    <?php
    foreach($citas as $cita) {  
        echo '<tr><td>'.$cita['idUser'].'</td>';
        echo '<td>'.$cita['fecha_cita'].'</td>';
        echo '<td>'.$cita['motivo_cita'].'</td></tr>';
    }
    ?>
    </table>  
    <?php include 'footer.php'; ?>
</body>
</html>
