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
    <div>
        <a href="add_noticia.php">Agregar noticia</a>
    </div> 
    <table> 
    <?php
    require_once 'NoticiasController.php';
    require_once 'connection.php';
    $noticiasController = new NoticiasController($db);
    $noticias = $noticiasController->obtenerTodasLasNoticias();
    foreach($noticias as $noticia) {  
        echo '<tr><td>Titulo:</td><td>'.$noticia['titulo'].'</td></tr>';
        echo '<tr><td>Fecha:</td><td>'.$noticia['fecha'].'</td></tr>';
        echo '<tr><td>Texto:</td><td>'.$noticia['texto'].'</td></tr>';
        echo '<tr><td>Imagen:</td><td>'.$noticia['imagen'].'</td></tr>';
        echo '<tr><td>Usuario:</td><td>'.$noticia['usuario'].'</td></tr>';
    }
    ?>
    </table>  
    <?php include 'footer.php'; ?>
</body>
</html>