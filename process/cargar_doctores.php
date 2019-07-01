<?php 
require('../config/conexion.php');
$id=$_POST['id'];
$doctores=$con->query("SELECT * FROM doctores WHERE status=1");
$carga_data='';

$carga_data .= '<label for="doctor_edit">Paciente: <span class="text-danger">*</span></label>
				<select class="form-control select2" id="doctor_id" name="doctor">
				<option value="">Seleccione</option>';
while($c = mysqli_fetch_array($doctores)){
 	$carga_data .= '<option value="'.$c['id_doctor'].'"';
 	if($c['id_doctor'] == $id){
 		$carga_data .= 'selected';
 	}
 	$carga_data .= '>'.$c['nombres'].' '.$c['apellidos'].'</option>';
}


$carga_data .= '</select>
				</div><script>$(".select2").select2();</script>';

echo $carga_data;

?>