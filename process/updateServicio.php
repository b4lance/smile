<?php 
require('../config/conexion.php');
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$precio=$_POST['precio'];

if(!empty($_POST['descripcion'])){
	$descripcion=$_POST['descripcion'];
	$guardar=mysqli_query($con,"UPDATE servicios SET nombre_servicio='$nombre',precio_servicio='$precio',descripcion='$descripcion' WHERE id_servicio='$id'");
}else{

$guardar=mysqli_query($con,"UPDATE servicios SET nombre_servicio='$nombre',precio_servicio='$precio' WHERE id_servicio='$id'");
}

if($guardar){
	echo '<script>swal("Excelente","Servicio editado con exito","success");</script>';
}

 ?>