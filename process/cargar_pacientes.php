<?php 
require('../config/conexion.php');
$id=$_POST['id'];
$pacientes=$con->query("SELECT * FROM pacientes WHERE status=1");
$carga_data='';

$carga_data .= '<label for="paciente_edit">Paciente: <span class="text-danger">*</span></label>
				<select class="form-control select2" id="paciente_edit" name="paciente">
				<option value="">Seleccione</option>';
while($c = mysqli_fetch_array($pacientes)){
 	$carga_data .= '<option value="'.$c['id_paciente'].'"';
 	if($c['id_paciente'] == $id){
 		$carga_data .= 'selected';
 	}
 	$carga_data .= '>'.$c['nombres'].' '.$c['apellidos'].'</option>';
}


$carga_data .= '</select>
				</div><script>$(".select2").select2();</script>';

echo $carga_data;

?>