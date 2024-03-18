<?php
require_once '../controllers/users.controller.php';
session_start();
if (!$_SESSION['userId'] || !$_SESSION['admin']) {
    header("Location: index.php");
    exit();
}
$usuariosController = new UsuariosController();
$usuarios = $usuariosController->obtenerTodosLosUsuarios();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios - ADMIN</title>
    <link rel="stylesheet" href="../css/estilo_plantilla.css" type="text/css">
    <link rel="stylesheet" href="../css/menu.css" type="text/css">
</head> 
<body>
    <?php include 'navbar.php'; ?>
    <h5 class="center"><a href="./add_usuario.php">Agregar usuario</a></h5>
    <table> 
    <tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>Teléfono</th>
        <th>Fecha de Nacimiento</th>
        <th>Direccion</th>
        <th>Sexo</th>
    </tr>
    <?php
    foreach($usuarios as $usuario) {  
        echo '<tr><td>'.$usuario['nombre'].'</td>';
        echo '<td>'.$usuario['apellidos'].'</td>';
        echo '<td>'.$usuario['email'].'</td>';
        echo '<td>'.$usuario['telefono'].'</td>';
        echo '<td>'.$usuario['fecha_nacimiento'].'</td>';
        echo '<td>'.$usuario['direccion'].'</td>';
        echo '<td>'.$usuario['sexo'].'</td></tr>';
    }
    ?>
    </table>  
    <?php include 'footer.php'; ?>
</body>
</html>
