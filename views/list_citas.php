<?php
require_once '../controllers/citas.controller.php';
session_start();
if (!$_SESSION['userId'] || !$_SESSION['admin']) {
    header("Location: index.php");
    exit();
}
$citasController = new CitasController();
if(isset($_GET['del'])){
    $citasController->eliminarCita($_GET['del']);
}
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
        <th>Borrar</th>
        <th>Editar</th>
    </tr>
    <?php
    foreach($citas as $cita) {  
        echo '<tr><td>'.$cita['idUser'].'</td>';
        echo '<td>'.$cita['fecha_cita'].'</td>';
        echo '<td>'.$cita['motivo_cita'].'</td>';
        echo '<td><a href="./list_citas.php?del='.$cita['idCita'].'">Borrar</a></td>';
        echo '<td><a href="./add_cita.php?edit='.$cita['idCita'].'">Editar</a></td></tr>';
    }
    ?>
    </table>  
    <?php include 'footer.php'; ?>
</body>
</html>
