<?php 
require('../config/conexion.php');
$usuario=mysqli_real_escape_string($con,$_POST['usuario']);
$password=md5($_POST['password']);


$verificar=mysqli_query($con,"SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$password'");
$nums=mysqli_num_rows($verificar);
if($nums > 0){
	$usuario=mysqli_fetch_assoc($verificar);
	session_start();
	$_SESSION['id_usuario']=$usuario['id_usuario'];
	$_SESSION['nombre']=$usuario['nombre'];
	$_SESSION['rol']=$usuario['rol'];

	echo '<script>window.location="home.php";</script>';
}else{
	echo '<script>swal("Error","Usuario y/o Password incorrectos, intenta nuevamente","error");</script>';
}

 ?>