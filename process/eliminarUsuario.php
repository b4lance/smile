<?php 
require('../config/conexion.php');
$id=$_POST['id'];
$delete_personal=$con->query("UPDATE usuarios SET status=0 WHERE id_usuario='$id'");

if($delete_personal){
	echo '<script>swal("Excelente","Usuario eliminado con exito","success");</script>';
}
 ?>