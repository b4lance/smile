<?php 
require('../config/conexion.php');
$hoy=date('Y-m-d');
$count_consulta_previas=mysqli_query($con,"SELECT * FROM pagos WHERE fecha='$hoy'");
$row_count_hoy=mysqli_num_rows($count_consulta_previas);
$total_consultas=mysqli_query($con,"SELECT COUNT(c.id_consulta) as totally,c.doctor_id,SUM(c.total) AS total_consulta,c.fecha,d.nombres AS nombre_doctor, d.apellidos AS apellido_doctor  FROM consultas AS c INNER JOIN doctores AS d ON c.doctor_id=d.id_doctor GROUP BY c.doctor_id");
$total_dia=0;
 ?>
 <?php if($row_count_hoy == 0){ ?>
<div class="table-responsive">
<table class="table" id="tabla2">
	<thead>
		<th>Doctor</th>
		<th>N° Consultas</th>
		<th>Total</th>
	</thead>
	<tbody>
	<?php while($row=mysqli_fetch_array($total_consultas)){
		$total_dia += $row['total_consulta'];
	?>
		<tr>
			<td><?php echo $row['nombre_doctor']; ?> <?php echo $row['apellido_doctor'] ?></td>
			<td><?php echo $row['totally']; ?></td>
			<td><?php echo $row['total_consulta'] ?></td>
		</tr>
	<?php } ?>
	<tr>
		<td colspan="3" align="right">TOTAL DEL DÍA: <?php echo number_format($total_dia,2,'.',''); ?> Bs S.</td>
	</tr>
	</tbody>
</table>
</div>
<div class="row mt-4">
	<div class="col-sm-12 d-flex justify-content-center">
		<button class="btn btn-sm btn-primary" onclick="confirmar();">Confirmar</button>
	</div>
</div>
<?php }else{ ?>
<div class="row d-flex justify-content-center">
	<h3>Ya se Realizo el Control del día</h3>
</div>
<?php } ?>

