<?php 
require('../config/conexion.php');
$id=$_POST['id'];
$paciente=$_POST['paciente'];
$doctor=$_POST['doctor'];
$precio=$_POST['precio'];
$fecha=$_POST['fecha'];
$motivo=$_POST['motivo'];
$servicios=$_POST['servicios'];
$metodo=$_POST['metodo_pago'];


$guardar=mysqli_query($con,"UPDATE consultas SET paciente_id='$paciente',doctor_id='$doctor',motivo='$motivo',servicios='$servicios',precio_consulta='$precio',total='$precio',fecha='$fecha',metodo_pago='$metodo' WHERE id_consulta='$id'");

/*$search_c=mysqli_query($con,"SELECT * FROM consultas where id_consulta='$id'");
$cons=mysqli_fetch_assoc($search_c);
$precio_consulta=$cons['precio_consulta'];*/

if($metodo == 'Transferencia' || $metodo == 'Deposito' || $metodo == 'Cheque'){
    if(isset($_POST['n_referencia']) || !empty($_POST['n_referencia'])){
      $n_referencia=$_POST['n_referencia'];
      $update_metodo=mysqli_query($con,"UPDATE consultas SET n_referencia='$n_referencia' WHERE id_consulta='$id'");
    }
}

$total=0;

//delete_detalle=mysqli_query($con,"DELETE FROM detalle_consulta WHERE consulta_id='$id'");

/*if(isset($_POST['servicio'])){
$servicio=$_POST['servicio'];
if(count($servicio) > 0){
for($i=0;$i < count($servicio) ;$i++){
	$search_s=mysqli_query($con,"SELECT * FROM servicios where id_servicio='$servicio[$i]'");
	$s=mysqli_fetch_assoc($search_s);

	$revisa_consulta=mysqli_query($con,"SELECT * FROM detalle_consulta WHERE consulta_id='$id' AND servicio_id='$servicio[$i]'");
	$revisa_num=mysqli_num_rows($revisa_consulta);

	if($revisa_num == 0){
		$precio_s=$s['precio_servicio'];
		$total+=$s['precio_servicio'];
		$guardar_servicios=mysqli_query($con,"INSERT INTO detalle_consulta(consulta_id,servicio_id,precio) VALUES ('$id','$servicio[$i]','$precio_s')");
	}

}
$total_final=$total+$precio_consulta;
$update_consulta=mysqli_query($con,"UPDATE consultas SET total='$total_final' WHERE id_consulta='$id'");

}
}*/


if($guardar){
	echo '<script>swal("Excelente","Consulta guardada con exito","success");</script>';
}

 ?>