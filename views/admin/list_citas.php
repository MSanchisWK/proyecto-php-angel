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
    <div>
        <a href="add_cita.php">Agregar cita</a>
    </div> 
    <table> 
    <?php
    require_once 'CitasController.php';
    require_once 'connection.php';
    $citasController = new CitasController($db);
    $citas = $citasController->obtenerTodasLasCitas();
    foreach($citas as $cita) {  
        echo '<tr><td>Usuario:</td><td>'.$cita['idUser'].'</td></tr>';
        echo '<tr><td>Fecha de cita:</td><td>'.$cita['fecha_cita'].'</td></tr>';
        echo '<tr><td>Motivo:</td><td>'.$cita['motivo_cita'].'</td></tr>';
    }
    ?>
    </table>  
    <?php include 'footer.php'; ?>
</body>
</html>
