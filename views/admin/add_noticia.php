<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias - ADMIN</title>
    <link rel="stylesheet" href="../css/estilo_plantilla.css" TYPE="text/css">
    <link rel="stylesheet" href="../css/menu.css" TYPE="text/css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <h1 align="center">Agregar noticia</h1>
    <form action="" method="POST">
        <label>Titulo:</label>
        <input type="text" name="titulo" required>
        <label>Fecha:</label>
        <input type="date" name="fecha" required>
        <label>Texto:</label>
        <textarea name="texto" required></textarea>
        <label>Imagen:</label>
        <input type="text" name="imagen" required>
        <?php
        require_once 'UsuariosController.php';
        require_once 'connection.php';
        $usuariosController = new UsuariosController($db);
        $usuarios = $usuariosController->obtenerTodosLosUsuarios();
        echo "<select name='idUser'>";
        foreach ($usuarios as $usuario) {
            echo "<option value='".$usuario['idUser']."'>".$usuario['usuario']."</option>";
        }
        echo "</select>";
        ?>
        <div align="center">
            <input type="submit" value="Agregar noticia">
            <a href="administracion_noticias.php">Regresar</a>
        </div>
    </form>
    <?php include 'footer.php'; ?>
</body>
</html>
