<?php
$idUser=$_POST['idUser'];
$titulo=$_POST['titulo'];
$imagen=$_POST['imagen'];
$texto=$_POST['texto'];
$fecha=$_POST['fecha'];
$sql="INSERT INTO noticias(idUser,titulo,imagen,texto,fecha) VALUES ('$idUser','$titulo','$imagen','$texto','$fecha')";
$resultado=mysqli_query($conexion,$sql);
if ($resultado === TRUE) {
      echo "Datos insertados correctamente";
      header("refresh:10;administracion_noticias.php");
}else{
      echo "Noticia no insertada";
}
      
?>