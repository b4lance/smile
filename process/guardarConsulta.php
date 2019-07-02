<?php 
require('../config/conexion.php');
$paciente=$_POST['paciente'];
$doctor=$_POST['doctor'];
$precio=$_POST['precio'];
$fecha=$_POST['fecha'];
$metodo=$_POST['metodo_pago'];
$motivo=$_POST['motivo'];


  $guardar=mysqli_query($con,"INSERT INTO consultas(paciente_id,doctor_id,motivo,precio_consulta,total,fecha,metodo_pago) VALUES ('$paciente','$doctor','$motivo','$precio','$precio','$fecha','$metodo')");

$id_consulta=mysqli_insert_id($con);
$search_c=mysqli_query($con,"SELECT * FROM consultas where id_consulta='$id_consulta'");
$cons=mysqli_fetch_assoc($search_c);
$precio_consulta=$cons['precio_consulta'];

if($metodo == 'Transferencia' || $metodo == 'Deposito' || $metodo == 'Cheque'){
    if(isset($_POST['n_referencia']) || !empty($_POST['n_referencia'])){
      $n_referencia=$_POST['n_referencia'];
      $update_metodo=mysqli_query($con,"UPDATE consultas SET n_referencia='$n_referencia' WHERE id_consulta='$id_consulta'");
    }
}

$total=0;

if(isset($_POST['servicio'])){
$servicio=$_POST['servicio'];
if(count($servicio) > 0){
for($i=0;$i < count($servicio) ;$i++){
	$search_s=mysqli_query($con,"SELECT * FROM servicios where id_servicio='$servicio[$i]'");
	$s=mysqli_fetch_assoc($search_s);
	$precio_s=$s['precio_servicio'];
	$total+=$s['precio_servicio'];
	$guardar_servicios=mysqli_query($con,"INSERT INTO detalle_consulta(consulta_id,servicio_id,precio) VALUES ('$id_consulta','$servicio[$i]','$precio_s')");
}
$total_final=$total+$precio_consulta;
$update_consulta=mysqli_query($con,"UPDATE consultas SET total='$total_final' WHERE id_consulta='$id_consulta'");

}
}


if($guardar){
	echo '<script>swal("Excelente","Consulta guardado con exito","success");swal({
      title: "Ticket",
      text: "¿Desea Imprimir el Ticket de esta Consulta?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, Imprimir",
      cancelButtonText: "No, cancelar!",
      confirmButtonClass: "btn btn-danger",
      cancelButtonClass: "btn btn-primary",
      buttonsStyling: false
      }).then(function () {
        var delay = 1000;
         setTimeout(function(){ window.open("includes/ticket.php?id='.$id_consulta.'","Factura","width=500, height=400") }, delay);    
        return true;    
      }, function (dismiss) {
    })</script>';
}

 ?>