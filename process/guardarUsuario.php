<?php 
require('../config/conexion.php');
$nombre=$_POST['nombre'];
$usuario=$_POST['usuario'];
$rol=$_POST['rol'];
$password=md5($_POST['password']);

$buscar=mysqli_query($con,"SELECT * FROM usuarios WHERE usuario='$usuario' AND status=1");
$rows=mysqli_num_rows($buscar);

if($rows > 0){
	echo '0';
}else{
	
		$guardar=mysqli_query($con,"INSERT INTO usuarios(nombre,usuario,password,rol) VALUES ('$nombre','$usuario','$password','$rol')");

	if($guardar){
		echo '<script>swal("Excelente","Usuario guardado con exito","success");</script>';
	}
}
 ?>