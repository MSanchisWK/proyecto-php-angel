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
    <div>
        <a href="add_usuario.php">Agregar usuario</a>
    </div> 
    <table> 
    <?php
    require_once 'UsuariosController.php';
    require_once 'connection.php';
    $usuariosController = new UsuariosController($db);
    $usuarios = $usuariosController->obtenerTodosLosUsuarios();
    foreach($usuarios as $usuario) {  
        echo '<tr><td>Nombre:</td><td>'.$usuario['nombre'].'</td></tr>';
        echo '<tr><td>Apellidos:</td><td>'.$usuario['apellidos'].'</td></tr>';
        echo '<tr><td>Email:</td><td>'.$usuario['email'].'</td></tr>';
        echo '<tr><td>Teléfono:</td><td>'.$usuario['telefono'].'</td></tr>';
        echo '<tr><td>Fecha de Nacimiento:</td><td>'.$usuario['fecha_nacimiento'].'</td></tr>';
        echo '<tr><td>Dirección:</td><td>'.$usuario['direccion'].'</td></tr>';
        echo '<tr><td>Sexo:</td><td>'.$usuario['sexo'].'</td></tr>';
        echo '<tr><td>Rol:</td><td>'.$usuario['rol'].'</td></tr>'; // Suponiendo que el rol del usuario está en la tabla de usuarios
    }
    ?>
    </table>  
    <?php include 'footer.php'; ?>
</body>
</html>
