<?php 
require '../config/conexion.php';
$id=$_GET['id'];
$sql=mysqli_query($con,"SELECT consultas.*,pacientes.nombres as nombre_paciente,pacientes.apellidos as apellido_paciente,pacientes.direccion as direccion_paciente,doctores.nombres as nombre_doctor,doctores.apellidos as apellido_doctor FROM consultas INNER JOIN pacientes ON consultas.paciente_id=pacientes.id_paciente INNER JOIN doctores ON consultas.doctor_id=doctores.id_doctor WHERE consultas.id_consulta='$id'");
//$sql2=mysqli_query($con,"SELECT * FROM detalle_consulta INNER JOIN servicios ON detalle_consulta.servicio_id=servicios.id_servicio WHERE detalle_consulta.consulta_id='$id'");

$c=mysqli_fetch_assoc($sql);
$iva=($c['total']*16)/100;
$total=number_format($iva,2,'.','')+$c['total'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ticket</title>
	<style>
		* {
  			font-size: 12px;
  			font-family: 'Times New Roman';
		}
		#header{
			margin-left: 30px;
  		margin-top: 140px;
		}
		#total{
			margin-top: 60px;
			margin-left: 30px;
			border: none;
			width: 200px;
		}
		td,
		th,
		tr,
		table {
			border-top: 1px solid rgba(0,0,0,0.7);
  			border-collapse: collapse;
  			margin-left: 30px;
  			margin-top: 20px;
  			width: 200px;
		}
		
		#ticket{
			width: 264.56px;
			height: 566.92px;
			max-width: 264.56px;
			/*border:1px solid rgba(0,0,0,0.6);*/
		}
	</style>
</head>
<body onload="window.print();">
  <div id="ticket">
  	<p id="header">
  		Fecha Emisión:<?php echo str_replace('-', '/', date('d-m-Y',strtotime($c['fecha']))); ?> <br>
  		Cliente: <?php echo strtolower($c['nombre_paciente']) ?> <?php echo strtolower($c['apellido_paciente']) ?><br>
  		Doctor: <?php echo strtolower($c['nombre_doctor']) ?> <?php echo strtolower($c['apellido_doctor']) ?><br>
  		Dirección: <?php strtolower($c['direccion_paciente']) ?>
  	</p>
	<table>
      <thead>
        <tr>
          <th>CANT</th>
          <th class="producto">DESCRIP</th>
          <th class="precio">PREC</th>
        </tr>
      </thead>
      <tbody>
      	<tr>
           <td>1.00</td>
          <td class="cantidad"><?php echo substr('CONSULTA',0,15); ?></td>
          <td class="precio" width="30%" align="center"><?php echo number_format($c['precio_consulta'],2,'.','') ?></td>
        </tr>
      
        <!--<tr>
           <td>1.00</td>
          <td class="cantidad"></td>
          <td class="precio" width="30%" align="center"></td>
        </tr>-->
       
      </tbody>
    </table>
    <table id="total">
    	<tr>
    		<td>SubTotal:</td>
    		<td align="right"><?php echo number_format($c['total'],2,'.','') ?></td>
    	</tr>
    	<tr>
    		<td>IVA 16%:</td>
    		<td align="right"><?php echo number_format($iva,2,'.',''); ?></td>
    	</tr>
    	<tr>
    		<td>Exento:</td>
    		<td align="right"> 0.00</td>
    	</tr>
    	<tr>
    		<td>Total:</td>
    		<td align="right">Bs S.<?php echo number_format($total,2,'.',''); ?></td>
    	</tr>
    </table>
  </div>
</body>
</html>