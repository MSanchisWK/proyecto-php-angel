<?php
require_once '../controllers/noticias.controller.php';
require_once '../controllers/users.controller.php';
session_start();
if (!$_SESSION['userId'] || !$_SESSION['admin']) {
    header("Location: index.php");
    exit();
}
$usuariosController = new UsuariosController();
$noticiasController = new NoticiasController();
$usuarios = $usuariosController->obtenerTodosLosUsuarios();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $noticiasController->crearNoticia($_POST['titulo'], "", $_POST['texto'], $_POST['fecha'], $_POST['idUser']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias - ADMIN</title>
    <link rel="stylesheet" href="../css/estilo_plantilla.css" type="text/css">
    <link rel="stylesheet" href="../css/menu.css" type="text/css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <h1 class="center">Agregar noticia</h1>
    <form action="" method="POST">
        <label>Titulo:</label>
        <input type="text" name="titulo" required>
        <label>Fecha:</label>
        <input type="date" name="fecha" required>
        <label>Texto:</label>
        <textarea name="texto" required></textarea>
        <label>Imagen:</label>
        <input type="file" name="imagen">
        <label>Usuario:</label>
        <?php
        echo "<select name='idUser'>";
        foreach ($usuarios as $usuario) {
            echo "<option value='".$usuario['idUser']."'>".$usuario['nombre']."</option>";
        }
        echo "</select>";
        ?>
        <div class="enviar">
            <input type="submit" value="Agregar noticia">
        </div>
    </form>
    <?php include 'footer.php'; ?>
</body>
</html>
