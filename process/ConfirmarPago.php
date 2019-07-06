<?php 
require('../config/conexion.php');
$fecha=date('Y-m-d');

$total_consultas=mysqli_query($con,"SELECT COUNT(c.id_consulta) as totally,c.doctor_id,SUM(c.total) AS total_consulta,c.fecha,d.nombres AS nombre_doctor, d.apellidos AS apellido_doctor  FROM consultas AS c INNER JOIN doctores AS d ON c.doctor_id=d.id_doctor GROUP BY c.doctor_id");

$total_completo=mysqli_query($con,"SELECT COUNT(id_consulta) AS total_consulta,SUM(total) AS total_dia FROM consultas WHERE fecha='$fecha'");

$pag=mysqli_fetch_assoc($total_completo);

$pago_dia=$pag["total_dia"];
$nro_consulta=$pag["total_consulta"];

$insert=mysqli_query($con,"INSERT INTO pagos(nro_consultas,precio_total,fecha) VALUES('$nro_consulta','$pago_dia','$fecha')");

$id_pago=mysqli_insert_id($con);

while($row=mysqli_fetch_array($total_consultas)){
	$id_doctor=$row['doctor_id'];
	$nro_consulta_doctor=$row['totally'];
	$totally=$row['total_consulta'];

	$insertDetalle=mysqli_query($con,"INSERT INTO detalle_pagos(pago_id,doctor_id,precio_diario,nro_consultas) VALUES('$id_pago','$id_doctor','$totally','$nro_consulta_doctor')");
}

if($insert){
	echo '<script>swal("Excelente","Pago diario registrado con exito","success")</script>';
}

?>