<?php 
require('../config/conexion.php');
$id=$_REQUEST['id'];
$hoy=date('Y-m-d');
$count_consulta_previas=mysqli_query($con,"SELECT * FROM pagos WHERE fecha='$hoy'");
$row_count_hoy=mysqli_num_rows($count_consulta_previas);
$total_consultas=mysqli_query($con,"SELECT * FROM detalle_pagos INNER JOIN doctores ON detalle_pagos.doctor_id=doctores.id_doctor WHERE detalle_pagos.pago_id='$id'");
$total_dia=0;
 ?>
 
<div class="table-responsive">
<table class="table" id="tabla2">
    <thead>
        <th>Doctor</th>
        <th>N° Consultas</th>
        <th>Total</th>
    </thead>
    <tbody>
    <?php while($row=mysqli_fetch_array($total_consultas)){
        $total_dia += $row['precio_diario'];
    ?>
        <tr>
            <td><?php echo $row['nombres']; ?> <?php echo $row['apellidos'] ?></td>
            <td><?php echo $row['nro_consultas']; ?></td>
            <td><?php echo $row['precio_diario'] ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<tr>
        <td colspan="3" align="right">TOTAL: <?php echo number_format($total_dia,2,'.',''); ?> Bs S.</td>
    </tr>
</div>

<script>
  $(document).ready(function() {
    $('#tabla2').DataTable({
            "language": {
                "lengthMenu": "Registros por pagina: _MENU_",
                "info": "Página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay Registros disponibles",
                "infoFiltered": "(filtrada de _MAX_ registros)",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "<i class='fa fa-search'></i>",
                "zeroRecords": "No se encontraron registros coincidentes",
                "paginate": {
                    "next": "<i class='fa fa-angle-double-right'></i>",
                    "previous": "<i class='fa fa-angle-double-left'></i>"
                },
            },
            "ordering": false,
        });
  });
  </script>
