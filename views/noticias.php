<?php
session_start();
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

    <?php foreach ($noticias as $noticia) { ?>
        <table> 
            <tr>
                <th>Título:</th>
                <td><?php echo $noticia['titulo']; ?></td>
            </tr>
            <tr>
                <th>Fecha de Publicación:</th>
                <td><?php echo $noticia['fecha']; ?></td>
            </tr>
            <tr>
                <th>Texto de la Noticia:</th>
                <td><?php echo $noticia['texto']; ?></td>
            </tr>
            <tr>
                <th>Foto de la Noticia:</th>
                <td><img src="<?php echo $noticia['imagen']; ?>" alt="Imagen de la Noticia" width="200"></td>
            </tr>
            <tr>
                <th>Nombre del Usuario:</th>
                <td><?php echo $noticia['nombre_usuario']; ?></td>
            </tr>
        </table>  
    <?php } ?>
    <?php include 'footer.php'; ?>
</body>
</html>
