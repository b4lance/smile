<?php 
require('../config/conexion.php');
$id=$_POST['id'];
$paciente=$_POST['paciente'];
$doctor=$_POST['doctor'];
$servicio=$_POST['servicio'];
$precio=$_POST['precio'];
$fecha=$_POST['fecha'];
$motivo=$_POST['motivo'];

$guardar=mysqli_query($con,"UPDATE consultas SET paciente_id='$paciente',doctor_id='$doctor',motivo='$motivo',precio_consulta='$precio',total='$precio',fecha='$fecha') WHERE id_consulta='$id'");

$id_consulta=mysqli_insert_id($con);
$search_c=mysqli_query($con,"SELECT * FROM consultas where id_consulta='$id_consulta'");
$cons=mysqli_fetch_assoc($search_c);
$precio_consulta=$cons['precio_consulta'];

$total=0;

if(count($servicio) > 0){
for($i=0;$i < count($servicio) ;$i++){
	$search_s=mysqli_query($con,"SELECT * FROM servicios where id_servicio='$servicio[$i]'");
	$s=mysqli_fetch_assoc($search_s);

	$delete_detalle=mysqli_query($con,"DELETE FROM detalle_consulta WHERE id_consulta='$id_consulta'");
	$revisa_consulta=mysqli_query($con,"SELECT * FROM detalle_consulta FROM consulta_id='$id_consulta' AND servicio_id='$servicio[$i]'");
	$revisa_num=mysqli_num_rows($revisa_consulta);

	if($revisa_num == 0){
		$precio_s=$s['precio_servicio'];
		$total+=$s['precio_servicio'];
		$guardar_servicios=mysqli_query($con,"INSERT INTO detalle_consulta(consulta_id,servicio_id,precio) VALUES ('$id_consulta','$servicio[$i]','$precio_s')");
	}

}
$total_final=$total+$precio_consulta;
$update_consulta=mysqli_query($con,"UPDATE consultas SET total='$total_final' WHERE id_consulta='$id_consulta'");

}


if($guardar){
	echo '<script>swal("Excelente","Consulta guardado con exito","success");</script>';
}

 ?>