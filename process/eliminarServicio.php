<?php 
require('../config/conexion.php');
$id=$_POST['id'];
$delete_personal=$con->query("UPDATE servicios SET status=0 WHERE id_servicio='$id'");

if($delete_personal){
	echo '<script>swal("Excelente","Servicio eliminado con exito","success");</script>';
}
 ?>