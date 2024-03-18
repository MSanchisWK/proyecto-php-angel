<?php 
$basepath='/apps/proyecto';
$usuario_autenticado = isset($_SESSION['userId']);
$es_administrador = false;
if(isset($_SESSION['userId'])){
    $es_administrador = $_SESSION['admin'];
}
?>
<header>
    <div><img src=<?php echo $basepath."/img/banner-902589_1920.jpg"?>></div>
    <div class="menu">
        <nav>
            <ul>
                <li><a href=<?php echo $basepath."/index.php"?>>Página principal</a></li>
                <li><a href=<?php echo $basepath."/views/noticias.php"?>>Noticias</a></li>
                <?php
                if ($usuario_autenticado) {
                    echo '<li><a href="'.$basepath.'/views/perfil.php">Perfil</a></li>';
                    echo '<li><a href="'.$basepath.'/views/citaciones.php">Citaciones</a></li>';
                    if ($es_administrador) {
                        echo '<li><a href="'.$basepath.'/views/list_usuarios.php">USUARIOS-ADMINISTRACION</a></li>';
                        echo '<li><a href="'.$basepath.'/views/list_citas.php">CITACIONES-ADMINISTRACION</a></li>';
                        echo '<li><a href="'.$basepath.'/views/list_noticias.php">NOTICIAS-ADMINISTRACION</a></li>';
                    }
                    echo '<li><a href="'.$basepath.'/index.php?cs=1">Cerrar Sesión</a></li>';
                } else {
                    echo '<li><a href="'.$basepath.'/views/login.php">Login</a></li>';
                    echo '<li><a href="'.$basepath.'/views/registro.php">Registro</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</header>
