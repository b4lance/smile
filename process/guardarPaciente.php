<?php 
require('../config/conexion.php');
$dni=$_POST['dni'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];

$buscar=mysqli_query($con,"SELECT * FROM pacientes WHERE dni='$dni' AND status=1");
$rows=mysqli_num_rows($buscar);

if($rows > 0){
	echo '0';
}else{
	$guardar=mysqli_query($con,"INSERT INTO pacientes(dni,nombres,apellidos,telefono,direccion,email) VALUES ('$dni','$nombre','$apellido','$telefono','$direccion','$email')");

	if($guardar){
		echo '<script>swal("Excelente","Paciente guardado con exito","success");</script>';
	}
}
 ?>