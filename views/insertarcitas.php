<?php
include("conexion.php");
$idUser=$_POST['idUser'];
$fecha_cita=$_POST['fecha_cita'];
$motivo_cita=$_POST['motivo_cita'];
$sql="INSERT INTO citas(idUser,fecha_cita,motivo_cita) VALUES ($idUser','$fecha_cita','$motivo_cita')";
$resultado=mysqli_query($conexion,$sql);
if ($resultado === TRUE) {
      echo "Datos insertados correctamente";
      header("refresh:5;administracion_citas.php");
}else{
      echo "Cita no insertada";
}
      
?>