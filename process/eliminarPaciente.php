<?php 
require('../config/conexion.php');
$id=$_POST['id'];
$delete_personal=$con->query("UPDATE pacientes SET status=0 WHERE id_paciente='$id'");

if($delete_personal){
	echo '<script>swal("Excelente","Paciente eliminado con exito","success");</script>';
}
 ?>