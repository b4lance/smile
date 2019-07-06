<?php include('includes/header.php'); 
$pacientes=mysqli_query($con,"SELECT * FROM pacientes WHERE status=1 ORDER BY nombres ASC"); 
$doctores=mysqli_query($con,"SELECT * FROM doctores WHERE status=1 ORDER BY nombres ASC"); 
$servicios=mysqli_query($con,"SELECT * FROM servicios WHERE status=1 ORDER BY nombre_servicio ASC"); 
?>

<body id="page-top">

  <div id="wrapper">
    
    <?php include('includes/aside.php'); ?>


    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
  
        <?php include('includes/navbar.php'); ?>

        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Consultas</h1>
          <button class="btn btn-sm btn-primary" style="background: none;border: none;" data-toggle="modal" data-target="#ModalNuevo" title="Nuevo Consulta">
            <img src="<?php echo url; ?>assets/img/nuevo.png"  alt="" width="30px">
          </button>
          </div>
          <div id="mensaje"></div>
          <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12" id="cargar_tabla"></div>
                        </div>
                    </div>
                </div>
            </div>
          </div>


          <!-- Modal Nuevo-->
          <div class="modal fade" id="ModalNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                  <h5 class="modal-title" id="exampleModalLabel">Nueva Consulta <span class="fa fa-plus"></span></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <div class="modal-body">
                  <form action="#" id="form_nuevo">
                      <div class="row">
                          <div class="form-group col-sm-12 col-md-4">
                              <label for="paciente">Paciente: <span class="text-danger">*</span></label>
                              <select name="paciente" id="paciente" class="form-control select2" style="width: 100%;height: 100%;">
                                  <option value="">Seleccione</option>
                                  <?php while($p=mysqli_fetch_array($pacientes)){ ?>
                                        <option value="<?php echo $p['id_paciente']?>"><?php echo $p['nombres'].' '.$p['apellidos'] ?></option>
                                  <?php } ?>
                              </select>
                          </div>

                          <div class="form-group col-sm-12 col-md-4">
                              <label for="doctor">Doctor: <span class="text-danger">*</span></label>
                              <select name="doctor" id="doctor" class="form-control select2" style="width: 100%;height: 100%;">
                                  <option value="">Seleccione</option>
                                  <?php while($d=mysqli_fetch_array($doctores)){ ?>
                                    <option value="<?php echo $d['id_doctor']?>"><?php echo $d['nombres'].' '.$d['apellidos'] ?></option>
                                  <?php } ?>
                              </select>
                          </div>

                           <div class="form-group col-sm-12 col-md-4">
                              <label for="fecha">Fecha: <span class="text-danger">*</span></label>
                              <input type="date" id="fecha" name="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                          </div>
                      </div>

                      <div class="row">
                    
                          <div class="form-group col-md-6 col-sm-12">
                              <label for="servicio">Servicios: <span class="text-danger">*</span></label>
                              <textarea type="text" id="servicios" name="servicios" class="form-control" cols="30" rows="3" onkeyup="mayus(this);" onkeypress="return validar_string_direccion(event);"></textarea>
                          </div>

                          <div class="form-group col-sm-12 col-md-6">
                              <label for="motivo">Motivo: <span class="text-danger">*</span></label>
                              <textarea type="text" id="motivo" name="motivo" class="form-control" cols="30" rows="3" onkeyup="mayus(this);" onkeypress="return validar_string_direccion(event);"></textarea>
                          </div>

                      </div>

                       <div class="row">  

                         <div class="form-group col-sm-12 col-md-6">
                              <label for="precio">Precio: <span class="text-danger">*</span></label>
                              <input type="text" id="precio" name="precio" class="form-control" onkeypress="return validar_numeros_puntos(event);" maxlength="15">
                          </div>
                        

                        <div class="form-group col-sm-12 col-md-6">
                          <label for="metodo_pago">Metodo de Pago: <span class="text-danger">*</span></label>
                              <select name="metodo_pago" id="metodo_pago" class="form-control select2" style="width: 100%;height: 100%;" onchange="metodo();">
                                  <option value="Efectivo">Efectivo</option>
                                  <option value="Transferencia">Transferencia</option>
                                  <option value="Deposito">Deposito</option>
                                  <option value="Cheque">Cheque</option>
                              </select>
                          </div>
                        
                      </div>

                      <div class="row" style="display: none;" id="div_referencia">
                        <div class=" form-group col-sm-12">
                            <label for="n_referencia">N° Referencia:</label>
                              <input type="text" id="n_referencia" name="n_referencia" class="form-control" onkeypress="return validar_numeros_puntos(event);" maxlength="20">
                        </div>
                      </div>


                  </form>
              </div>
            <div class="modal-footer d-flex justify-content-center">
              <button type="button" class="btn btn-primary" title="Guardar Datos" style="background: none;border: none;margin-top: -10px;" onclick="guardar();">
                  <img src="<?php echo url; ?>assets/img/guardar.png" alt="" width="40px">
              </button>
            </div>
          </div>
          </div>
        </div>


          <!-- Modal Editar-->
          <div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                  <h5 class="modal-title" id="exampleModalLabel">Editar Consulta <span class="fa fa-plus"></span></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <div class="modal-body">
                <form action="#" id="form_update">
                      <div class="row">
                          <div class="form-group col-sm-12 col-md-4" id="cargar_pacientes">
                              
                          </div>

                          <div class="form-group col-sm-12 col-md-4" id="cargar_doctores">
                              
                          </div>

                           <div class="form-group col-sm-12 col-md-4">
                              <label for="fecha_edit">Fecha: <span class="text-danger">*</span></label>
                              <input type="text" id="fecha_edit" name="fecha" class="form-control">
                        </div>

                      </div>

                       <div class="row">

                         <div class="form-group col-sm-12">
                              <label for="servicios_edit">Servicios: <span class="text-danger">*</span></label>
                              <textarea type="text" id="servicios_edit" name="servicios" class="form-control" cols="30" rows="3" onkeyup="mayus(this);" onkeypress="return validar_string_direccion(event);"></textarea>
                          </div>

                           <div class="form-group col-sm-12">
                              <label for="motivo_edit">Motivo: <span class="text-danger">*</span></label>
                              <textarea type="text" id="motivo_edit" name="motivo" class="form-control" cols="30" rows="3" onkeyup="mayus(this);" onkeypress="return validar_string_direccion(event);"></textarea>
                              <input type="hidden" id="id_consulta" name="id">
                          </div>
                      </div>

                      <div class="row">
                      
                          <div class="form-group col-sm-12 col-md-6">
                              <label for="precio_edit">Precio: <span class="text-danger">*</span></label>
                              <input type="text" id="precio_edit" name="precio" class="form-control" onkeypress="return validar_numeros_puntos(event);" maxlength="15">
                          </div>

                           <div class="form-group col-sm-12 col-md-6">
                          <label for="metodo_pago_edit">Metodo de Pago: </label>
                              <select name="metodo_pago" id="metodo_pago_edit" class="form-control select2" style="width: 100%;height: 100%;" onchange="metodo_edit();">
                                  <option value="Efectivo">Efectivo</option>
                                  <option value="Transferencia">Transferencia</option>
                                  <option value="Deposito">Deposito</option>
                                  <option value="Cheque">Cheque</option>
                              </select>
                          </div>
                      </div>

                      <div class="row" style="display: none;" id="div_referencia_edit">
                        <div class=" form-group col-sm-12">
                            <label for="n_referencia_edit">N° Referencia:</label>
                              <input type="text" id="n_referencia_edit" name="n_referencia" class="form-control" onkeypress="return validar_numeros_puntos(event);" maxlength="20">
                        </div>
                      </div>

                </form>
              </div>
            <div class="modal-footer d-flex justify-content-center">
              <button type="button" class="btn btn-primary" title="Guardar Datos" style="background: none;border: none;margin-top: -10px;" onclick="update();">
                  <img src="<?php echo url; ?>assets/img/guardar.png" alt="" width="40px">
              </button>
            </div>
          </div>
          </div>
        </div>

        <!-- Modal Ver-->
          <div class="modal fade" id="ModalVer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                  <h5 class="modal-title" id="exampleModalLabel">Ver Detalles de la Consulta <span class="fa fa-eye"></span></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <strong>Paciente: </strong><span id="ver_paciente"></span>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <strong>Doctor: </strong><span id="ver_doctor"></span>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <strong>Servicios: </strong><span id="ver_servicio"></span>
                        </div>


                        <div class="col-sm-12 mt-3">
                            <strong>Precio: </strong><span id="ver_precio"></span> Bs S.
                        </div>

                         <div class="col-sm-12 mt-3">
                            <strong>Metodo de Pago: </strong><span id="ver_metodo"></span>
                        </div>

                         <div class="col-sm-12 mt-3">
                            <strong>N° de Referencia: </strong><span id="ver_referencia"></span>
                        </div>

                         <div class="col-sm-12 mt-3">
                            <strong>Fecha: </strong><span id="ver_fecha"></span>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <strong>Motivo: </strong><span id="ver_motivo"></span>
                        </div>

                    </div>
              </div>
          </div>
        </div>

            
        </div>

      </div>
     
<?php include('includes/footer.php'); ?>

  <script>
    function cargar_tabla(){
      $('#cargar_tabla').load('includes/tablaConsultas.php');
    }
    cargar_tabla();

    function eliminar(id){
      swal({
      title: 'Anular Consulta',
      text: "¿Desea Anular esta Consulta?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminar',
      cancelButtonText: 'No, cancelar!',
      confirmButtonClass: 'btn btn-danger',
      cancelButtonClass: 'btn btn-primary',
      buttonsStyling: false
      }).then(function () {
            $.ajax({
                url:"process/eliminarConsulta.php",
                type:"POST",
                data: 'id='+id,
                success:function(respuesta){
                    $('#mensaje').html(respuesta);
                    cargar_tabla();
                }
            });
            return true;    
      }, function (dismiss) {
    })
    }

    function guardar(){
        var paciente=$('#paciente').val();
        var doctor=$('#doctor').val();
        var precio=$('#precio').val();
        var motivo=$('#motivo').val();
        var fecha=$('#fecha').val();
        var metodo_pago=$('#metodo_pago').val(); 
        var n_referencia=$('#n_referencia').val(); 


        if(paciente === ''){
            swal('Error','El campo Paciente es requerido','error');
            return false;
        }else if(doctor === ''){
            swal('Error','El campo Doctor es requerido','error');
            return false;
        }else if(precio === ''){
            swal('Error','El campo Precio es requerido','error');
            return false;
        }else if(fecha === ''){
          swal('Error','El campo Fecha es requerido','error');
          return false;
        }else if(metodo_pago === ''){
          swal('Error','El campo Metodo de Pago es requerido','error');
          return false;
        }else if(motivo === ''){
            swal('Error','El campo Motivo es requerido','error');
            return false;
        }else{

        $.ajax({
          url:"process/guardarConsulta.php",
          type:"POST",
          data:$('#form_nuevo').serialize(),
          success:function(data){
              $('#mensaje').html(data);
              $('#ModalNuevo').modal('hide');
              cargar_tabla();
              $('#form_nuevo')[0].reset();
              $('#div_referencia').css('display','none');
          }
        });

        }

    }

    function editar(id,paciente,doctor,servicio,precio,motivo,fecha,metodo,referencia){
        $('#id_consulta').val(id);
        //$('#servicio_edit').val(servicio);
        $('#precio_edit').val(precio);
        $('#motivo_edit').val(motivo);
        $('#servicios_edit').val(servicio);
        $('#fecha_edit').val(fecha);
        $('#metodo_pago_edit').val(metodo);
        if(metodo === 'Transferencia' || metodo === 'Deposito' || metodo === 'Cheque'){
            $('#div_referencia_edit').css('display','block');
            $('#n_referencia_edit').val(referencia);
        }
        $('#cargar_pacientes').load('process/cargar_pacientes.php',{id:paciente});
        $('#cargar_doctores').load('process/cargar_doctores.php',{id:doctor});
        //$('#cargar_servicios').load('process/cargar_servicios.php',{id:servicio});
        $('#ModalEditar').modal('show');
    }

     function ver(paciente,doctor,servicio,precio,motivo,fecha,metodo,referencia){
        $('#ver_paciente').html(paciente);
        $('#ver_doctor').html(doctor);
        $('#ver_servicio').html(servicio);
        $('#ver_metodo').html(metodo);
        $('#ver_referencia').html(referencia);
        $('#ver_precio').html(precio);
        $('#ver_motivo').html(motivo);
        $('#ver_fecha').html(fecha);
        $('#ModalVer').modal('show');
    }

     function update(){
        var paciente=$('#paciente_edit').val();
        var doctor=$('#doctor_edit').val();
        var precio=$('#precio_edit').val();
        var fecha=$('#fecha_edit').val();
        var motivo=$('#motivo_edit').val();

        if(paciente === ''){
            swal('Error','El campo Paciente es requerido','error');
        }else if(doctor === ''){
            swal('Error','El campo Doctor es requerido','error');
        }else if(precio === ''){
            swal('Error','El campo Precio es requerido','error');
        }else if(fecha === ''){
          swal('Error','El campo Fecha es requerido','error');
        }else if(motivo === ''){
            swal('Error','El campo Motivo es requerido','error');
        }else{

        $.ajax({
          url:"process/updateConsulta.php",
          type:"POST",
          data:$('#form_update').serialize(),
          success:function(data){
            $('#mensaje').html(data);
            $('#ModalEditar').modal('hide');
            cargar_tabla();
            $('#form_update')[0].reset();
          }
        });

        }

    }
    function imprimir(id){
       window.open("includes/ticket.php?id="+id,"Factura","width=500, height=400")
    }

    function metodo(){
      var metodo_pago=$('#metodo_pago').val();

      if(metodo_pago === 'Transferencia' || metodo_pago === 'Deposito' || metodo_pago === 'Cheque'){
          $('#div_referencia').css('display','block');
      }else{
         $('#div_referencia').css('display','none');
      }
    }

     function metodo_edit(){
      var metodo_pago=$('#metodo_pago_edit').val();

      if(metodo_pago === 'Transferencia' || metodo_pago === 'Deposito' || metodo_pago === 'Cheque'){
          $('#div_referencia_edit').css('display','block');
      }else{
         $('#div_referencia_edit').css('display','none');
      }
    }
  </script>
  <script src="<?php echo url; ?>assets/js/funciones.js"></script>
</body>

</html>
