<?php 
require('../config/conexion.php');
$pacientes=mysqli_query($con,"SELECT consultas.*,pacientes.nombres as nombre_paciente,pacientes.apellidos as apellido_paciente,doctores.nombres as nombre_doctor,doctores.apellidos as apellido_doctor FROM consultas INNER JOIN pacientes ON consultas.paciente_id=pacientes.id_paciente INNER JOIN doctores ON consultas.doctor_id=doctores.id_doctor WHERE consultas.status=1 ORDER BY consultas.id_consulta DESC");
 ?>
<div class="table-responsive">
                        <table class="table" id="tabla" width="100%">
                            <thead>
                                <tr>
                                    <th align="center">Paciente</th>
                                    <th align="center">Doctor</th>
                                    <th align="center">Precio</th>
                                    <th align="center">Fecha</th>
                                    <th align="center">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while($p=mysqli_fetch_array($pacientes)){?>
                                <?php 
                                    /*$id_consulta=$p['id_consulta'];
                                    $sql3=mysqli_query($con,"SELECT * FROM detalle_consulta INNER JOIN servicios ON detalle_consulta.servicio_id=servicios.id_servicio WHERE detalle_consulta.consulta_id='$id_consulta'");
                                    $services='';
                                    while($detalle=mysqli_fetch_array($sql3)){
                                        $services .= $detalle['nombre_servicio'].', ';
                                    }*/
                                 ?>
                                <tr>
                                    <td><?php echo $p["nombre_paciente"].' '.$p['apellido_paciente']; ?></td>
                                    <td><?php echo $p["nombre_doctor"].' '.$p['apellido_doctor']; ?></td>
                                    <td width="15%"><?php echo $p["total"]; ?>Bs S.</td>
                                    <td><?php echo str_replace('-', '/', date('d-m-Y',strtotime($p['fecha']))); ?></td>
                                    <td width="30%">

                                         <button class="btn btn-sm" title="Ver Detalles" style="background: none;border: none;margin-top: -10px;" onclick="ver('<?php echo $p['nombre_paciente'].' '.$p['apellido_paciente'] ?>','<?php echo $p['nombre_doctor'].' '.$p['apellido_doctor'] ?>','<?php echo $p['servicios'] ?>','<?php echo $p['total'] ?>','<?php echo $p['motivo'] ?>','<?php echo str_replace('-', '/', date('d-m-Y',strtotime($p['fecha']))); ?>','<?php echo $p['metodo_pago']; ?>','<?php echo $p['n_referencia'] ?>')">
                                            <img src="assets/img/ver.png" width="30px" alt="">
                                        </button>

                                         <button class="btn btn-sm" title="Editar Datos" style="background: none;border: none;margin-top: -10px;" onclick="editar('<?php echo $p['id_consulta'] ?>','<?php echo $p['paciente_id'] ?>','<?php echo $p['doctor_id'] ?>','<?php echo $p['servicios']; ?>','<?php echo $p['precio_consulta'] ?>','<?php echo $p['motivo'] ?>','<?php echo str_replace('-', '/', date('d-m-Y',strtotime($p['fecha']))); ?>','<?php echo $p['metodo_pago']; ?>','<?php echo $p['n_referencia']; ?>')">
                                            <img src="assets/img/editar.png" width="30px" alt="">
                                        </button>

                                        <button class="btn btn-sm" title="Eliminar" onclick="eliminar('<?php echo $p['id_consulta'] ?>')" style="background: none;border: none;margin-top: -10px;">
                                            <img src="assets/img/eliminar.png" width="30px" alt="">
                                        </button>

                                        <button class="btn btn-sm" title="Imprimir Factura" onclick="imprimir('<?php echo $p['id_consulta'] ?>')" style="background: none;border: none;margin-top: -10px;">
                                            <img src="assets/img/file.png" width="30px" alt="">
                                        </button>
                                    </td>         
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                      </div>
 <script>
  $(document).ready(function() {
    $('#tabla').DataTable({
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