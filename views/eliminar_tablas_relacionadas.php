Eliminar noticias

<?php
$idUser = $_GET['idUser'];

$sql = "DELETE titulo,imagen,texto,fecha "FROM noticias
INNER JOIN users_login ON noticias.idUser = users_login.idUser
WHERE noticias.idUser = $idUser";
        
$resultado = $mysqli->query($sql);

if($resultado) {
  echo "Noticia eliminada exitosamente";
} else {
  echo "Error al eliminar";
}
?>

Eliminar usuarios

<?php
$idUser = $_GET['idUser'];

$sql = "DELETE nombre,apellidos,email,telefono,fecha_nacimiento,direccion,sexo,usuario,password,rol" FROM users_data
INNER JOIN users_login ON users_data.idUser = users_login.idUser
WHERE users_data.idUser = $idUser";
        
$resultado = $mysqli->query($sql);

if($resultado) {
  echo "Usuario eliminado exitosamente";
} else {
  echo "Error al eliminar";
}
?>

Eliminar citas

<?php
$idUser = $_GET['idUser'];

$sql = "DELETE fecha_cita, motivo_cita" FROM citas
INNER JOIN users_login ON citas.idUser = users_login.idUser
WHERE citas.idUser = $idUser";
        
$resultado = $mysqli->query($sql);

if($resultado) {
  echo "Cita eliminada exitosamente";
} else {
  echo "Error al eliminar";
}
?>

<a href = "pagina_de_confirmar.php/?idUser">Eliminar Registro</a>

//en pagina_de_confirmar.php estaria el siguiente codigo
<?php

    if(isset($_GET["idUser"]))
    {
        ?>
            <p>Realmente desea eliminar este registro?</p>
            <a href = "<?=$_SERVER["HTTP_REFERER"]?>">Cancelar</a>
            <br>
            <a href = "eliminar.php/?idUser=<?=$_GET["idUser"]?>">Eliminar</a>
        <?php
    }

?>

