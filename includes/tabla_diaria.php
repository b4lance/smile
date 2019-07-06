<?php 
require('../config/conexion.php');
$pacientes=mysqli_query($con,"SELECT * FROM pagos WHERE status=1 ORDER BY id_pago DESC");
 ?>
<div class="table-responsive">
                        <table class="table" id="tabla" width="100%">
                            <thead>
                                <tr>
                                    <th align="center">Fecha</th>
                                    <th align="center">Total Consultas</th>
                                    <th align="center">Total del Día</th>
                                    <th align="center">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while($p=mysqli_fetch_array($pacientes)){?>
                                <tr>
                                    <td><?php echo str_replace('-', '/', date('d-m-Y',strtotime($p['fecha']))); ?></td>
                                    <td><?php echo $p['nro_consultas']; ?></td>
                                    <td><?php echo $p['precio_total']; ?></td>  
                                    <td> <button class="btn btn-sm" title="Ver Detalles" style="background: none;border: none;margin-top: -10px;" onclick="ver('<?php echo $p['id_pago'] ?>')">
                                            <img src="assets/img/ver.png" width="30px" alt="">
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