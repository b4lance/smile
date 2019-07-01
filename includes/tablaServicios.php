<?php 
require('../config/conexion.php');
$pacientes=mysqli_query($con,"SELECT * FROM servicios WHERE status=1 ORDER BY id_servicio DESC");
 ?>
<div class="table-responsive">
                        <table class="table" id="tabla" width="100%">
                            <thead>
                                <tr>
                                    <th align="center">Nombre Servicio</th>
                                    <th align="center">Precio</th>
                                    <th align="center">Descripción</th>
                                    <th align="center">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while($p=mysqli_fetch_array($pacientes)){?>
                                <tr>
                                    <td><?php echo $p['nombre_servicio']; ?></td>
                                    <td><?php echo $p['precio_servicio']; ?> Bs S.</td>
                                    <td><?php echo $p['descripcion']; ?></td>   
                                    <td>

                                         <button class="btn btn-sm" title="Editar Datos" style="background: none;border: none;margin-top: -10px;" onclick="editar('<?php echo $p['id_servicio'] ?>','<?php echo $p['nombre_servicio'] ?>','<?php echo $p['precio_servicio'] ?>','<?php echo $p['descripcion']; ?>')">
                                            <img src="assets/img/editar.png" width="30px" alt="">
                                        </button>

                                        <button class="btn btn-sm" title="Eliminar" onclick="eliminar('<?php echo $p['id_servicio']; ?>')" style="background: none;border: none;margin-top: -10px;">
                                            <img src="assets/img/eliminar.png" width="30px" alt="">
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