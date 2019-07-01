<?php 
require('../config/conexion.php');
$id=$_POST['id'];
$dni=$_POST['dni'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];

$verificar=mysqli_query($con,"SELECT * FROM doctores WHERE dni='$dni' AND id_doctor != '$id'");

$rows=mysqli_num_rows($verificar);

if($rows > 0){
	echo '0';
}else{

$guardar=mysqli_query($con,"UPDATE doctores SET dni='$dni',nombres='$nombre',apellidos='$apellido',telefono='$telefono',direccion='$direccion',email='$email' WHERE id_doctor='$id'");

if($guardar){
	echo '<script>swal("Excelente","Doctor editado con exito","success");</script>';
}

}

 ?>