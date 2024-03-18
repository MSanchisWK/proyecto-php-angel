<?php
require_once '../controllers/noticias.controller.php';
session_start();
if (!$_SESSION['userId'] || !$_SESSION['admin']) {
    header("Location: index.php");
    exit();
}
$noticiasController = new NoticiasController();
$noticias = $noticiasController->obtenerTodasLasNoticias();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias - ADMIN</title>
	<link rel="stylesheet" href="../css/estilo_plantilla.css" type="text/css">
    <link rel="stylesheet" href="../css/menu.css" type="text/css">
</head>	
<body>
    <?php include 'navbar.php'; ?>
    <h5 class="center"><a href="./add_noticia.php">Agregar noticia</a></h5>
    <table> 
    <tr>
        <th>Titulo</th>
        <th>Fecha</th>
        <th>Texto</th>
        <th>Usuario</th>
    </tr>
    <?php
    foreach($noticias as $noticia) {  
        echo '<tr><td>'.$noticia['titulo'].'</td>';
        echo '<td>'.$noticia['fecha'].'</td>';
        echo '<td>'.$noticia['texto'].'</td>';
        echo '<td>'.$noticia['imagen'].'</td>';
        echo '<td>'.$noticia['nombre_usuario'].'</td></tr>';
    }
    ?>
    </table>  
    <?php include 'footer.php'; ?>
</body>
</html>