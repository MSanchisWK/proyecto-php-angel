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
    <h1 align="center">Gestión de Citaciones</h1>
    <h2>Solicitar Cita</h2>
    <form action="procesar_cita.php" method="POST">
        <label>Fecha de Cita:</label>
        <input type="date" name="fecha_cita" required>
        <label>Motivo de la Cita:</label>
        <input type="text" name="motivo_cita" required>
        <div align="center">
            <input type="submit" value="Solicitar Cita">
        </div>
    </form>

    <!-- Listado de citas planificadas -->
    <h2>Mis Citas Planificadas</h2>
    <table>
        <tr>
            <th>Fecha de Cita</th>
            <th>Motivo de la Cita</th>
            <th>Acciones</th>
        </tr>
        <?php
        require_once 'CitasController.php';
        require_once 'connection.php';
        $citasController = new CitasController($db);
        $citas = $citasController->obtenerTodasLasCitas();
        foreach ($citas as $cita) {
            echo '<tr>';
            echo '<td>' . $cita['fecha_cita'] . '</td>';
            echo '<td>' . $cita['motivo_cita'] . '</td>';
            if (strtotime($cita['fecha_cita']) > time()) {
                echo '<td><a href="modificar_cita.php?id=' . $cita['idCita'] . '">Modificar</a> | <a href="eliminar_cita.php?id=' . $cita['idCita'] . '">Eliminar</a></td>';
            } else {
                echo '<td>Cita realizada</td>';
            }
            echo '</tr>';
        }
        ?>
    </table>
    <?php include 'footer.php'; ?>
</body>
</html>
