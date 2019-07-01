<?php 
require('../config/conexion.php');
$usuarios=mysqli_query($con,"SELECT * FROM usuarios WHERE status=1 ORDER BY id_usuario DESC");
 ?>
<div class="table-responsive">
                        <table class="table" id="tabla" width="100%">
                            <thead>
                                <tr>
                                    <th align="center">Nombre</th>
                                    <th align="center">Usuario</th>
                                    <th align="center">Rol</th>
                                    <th align="center">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while($u=mysqli_fetch_array($usuarios)){?>
                                <tr>
                                    <td><?php echo $u['nombre']; ?></td>
                                    <td><?php echo $u['usuario']; ?></td>   
                                    <td><?php echo $u['rol']; ?></td>
                                    <td>

                                         <button class="btn btn-sm" title="Editar Datos" style="background: none;border: none;margin-top: -10px;" onclick="editar('<?php echo $u['id_usuario'] ?>','<?php echo $u['nombre'] ?>','<?php echo $u['usuario']; ?>','<?php echo $u['rol'] ?>')">
                                            <img src="assets/img/editar.png" width="30px" alt="">
                                        </button>

                                        <button class="btn btn-sm" title="Eliminar" onclick="eliminar('<?php echo $u['id_usuario']; ?>')" style="background: none;border: none;margin-top: -10px;">
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