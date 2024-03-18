<?php
require_once '../controllers/noticias.controller.php';
$noticiasController = new NoticiasController();
$noticias = $noticiasController->obtenerTodasLasNoticias();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <link rel="stylesheet" href="../css/estilo_plantilla.css" TYPE="text/css">
    <link rel="stylesheet" href="../css/menu.css" TYPE="text/css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <h1 class="center">Noticias</h1>
    <h3 class="center"><a href="add_noticia.php">Agregar noticia</a></h3>
    <table> 
    <?php foreach ($noticias as $noticia) { ?>
        <tr>
            <td>Título:</td>
            <td><?php echo $noticia['titulo']; ?></td>
        </tr>
        <tr>
            <td>Fecha de Publicación:</td>
            <td><?php echo $noticia['fecha']; ?></td>
        </tr>
        <tr>
            <td>Texto de la Noticia:</td>
            <td><?php echo $noticia['texto']; ?></td>
        </tr>
        <tr>
            <td>Foto de la Noticia:</td>
            <td><img src="<?php echo $noticia['imagen']; ?>" alt="Imagen de la Noticia" width="200"></td>
        </tr>
        <tr>
            <td>Nombre del Usuario:</td>
            <td><?php echo $noticia['nombre_usuario']; ?></td>
        </tr>
    <?php } ?>
    </table>  
    <?php include 'footer.php'; ?>
</body>
</html>
