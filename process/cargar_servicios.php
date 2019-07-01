<?php 
require('../config/conexion.php');
$id=$_POST['id'];
$servicios=$con->query("SELECT * FROM servicios WHERE status=1");
$carga_data='';

$carga_data .= '<label for="servicio_edit">Servicios:</label>
				<select class="form-control select2" id="servicio_edit" name="servicio[]" multiple="multiple">
				<option value="">Seleccione</option>';
while($c = mysqli_fetch_array($servicios)){
	$id_servicio=$c['id_servicio'];
	$revisar=mysqli_query($con,"SELECT * FROM detalle_consulta WHERE consulta_id='$id' AND servicio_id='$id_servicio'");
	$num_r=mysqli_num_rows($revisar);
	if($num_r == 1){
		$carga_data .= '<option value="'.$c['id_servicio'].'"';
 		$carga_data .= 'selected>'.$c['nombre_servicio'].'</option>';
	}else{
		$carga_data .= '<option value="'.$c['id_servicio'].'"';
 		$carga_data .= '>'.$c['nombre_servicio'].'</option>';
	}
 	
}



$carga_data .= '</select>
				</div><script>$(".select2").select2();</script>';

echo $carga_data;

?>