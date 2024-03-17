<?php 
$usuario_autenticado = isset($_SESSION['userId']);
$es_administrador = false;
if(isset($_SESSION['userId']);){
    $es_administrador = $_SESSION['admin'];
}
?>
<header>
    <img src="../img/banner-902589_1920.jpg">
    <div class="menu">
        <nav>
            <ul>
                <li><a href="../index.php">Página principal</a></li>
                <li><a href="noticias.php">Noticias</a></li>
                <?php
                if ($usuario_autenticado) {
                    echo '<li><a href="perfil.php">Perfil</a></li>';
                    echo '<li><a href="citaciones.php">Citaciones</a></li>';
                    echo '<li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>';
                    if ($es_administrador) {
                        echo '<li><a href="admin/list_usuarios.php">USUARIOS-ADMINISTRACION</a></li>';
                        echo '<li><a href="admin/list_citas.php">CITACIONES-ADMINISTRACION</a></li>';
                        echo '<li><a href="admin/list_noticias.php">NOTICIAS-ADMINISTRACION</a></li>';
                    }
                } else {
                    echo '<li><a href="login.php">Login</a></li>';
                    echo '<li><a href="registro.php">Registro</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</header>
