<?php 
require('../config/conexion.php');
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$usuario=$_POST['usuario'];
$rol=$_POST['rol'];
$pass=$_POST['password'];

$verificar=mysqli_query($con,"SELECT * FROM usuarios WHERE usuario='$usuario' AND id_usuario != '$id'");

$rows=mysqli_num_rows($verificar);

if($rows > 0){
	echo '0';
}else{

	if(!empty($pass)){
		$password=md5($pass);
		
		$guardar=mysqli_query($con,"UPDATE usuarios SET nombre='$nombre',usuario='$usuario',password='$password',rol='$rol' WHERE id_usuario='$id'");
	}else{
		
		$guardar=mysqli_query($con,"UPDATE usuarios SET nombre='$nombre',usuario='$usuario',rol='$rol' WHERE id_usuario='$id'");
	}

if($guardar){
	echo '<script>swal("Excelente","Usuario editado con exito","success");</script>';
}

}

 ?>