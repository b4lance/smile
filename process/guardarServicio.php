<?php 
require('../config/conexion.php');
$nombre=$_POST['nombre'];
$precio=$_POST['precio'];
$descripcion=$_POST['descripcion'];

$guardar=mysqli_query($con,"INSERT INTO servicios(nombre_servicio,precio_servicio,descripcion) VALUES ('$nombre','$precio','$descripcion')");

if($guardar){
	echo '<script>swal("Excelente","Servicio guardado con exito","success");</script>';
}

 ?>