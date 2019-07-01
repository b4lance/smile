<?php 
require('../config/conexion.php');
$id=$_POST['id'];
$delete_personal=$con->query("UPDATE consultas SET status=0 WHERE id_consulta='$id'");

if($delete_personal){
	echo '<script>swal("Excelente","Consulta anulada con exito","success");</script>';
}
 ?>