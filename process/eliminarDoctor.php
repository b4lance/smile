<?php 
require('../config/conexion.php');
$id=$_POST['id'];
$delete_personal=$con->query("UPDATE doctores SET status=0 WHERE id_doctor='$id'");

if($delete_personal){
	echo '<script>swal("Excelente","Doctor eliminado con exito","success");</script>';
}
 ?>