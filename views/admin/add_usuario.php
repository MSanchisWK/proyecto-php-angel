<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuaruos - ADMIN</title>
    <link rel="stylesheet" href="../css/estilo_plantilla.css" TYPE="text/css">
    <link rel="stylesheet" href="../css/menu.css" TYPE="text/css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <h1 align="center">Agregar usuario</h1>
    <form action="" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <label>Apellidos:</label>
        <input type="text" name="apellidos" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Teléfono:</label>
        <input type="text" name="telefono" required>
        <label>Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" required>
        <label>Dirección:</label>
        <input type="text" name="direccion" required>
        <label>Sexo:</label>
        <select name="sexo" required>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            <option value="Otro">Otro</option>
        </select>
        <label>Rol:</label>
        <select name="rol" required>
            <option value="Admin">Admin</option>
            <option value="Usuario">Usuario</option>
        </select>
        <div align="center">
            <input type="submit" value="Agregar usuario">
            <a href="administracion_usuarios.php">Regresar</a>
        </div>
    </form>
    <?php include 'footer.php'; ?>
</body>
</html>
