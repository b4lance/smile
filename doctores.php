<?php include('includes/header.php'); ?>

<body id="page-top">

  <div id="wrapper">
    
    <?php include('includes/aside.php'); ?>


    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
  
        <?php include('includes/navbar.php'); ?>

        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Doctores</h1>
          <button class="btn btn-sm btn-primary" style="background: none;border: none;" data-toggle="modal" data-target="#ModalNuevo" title="Nuevo Doctor">
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
                  <h5 class="modal-title" id="exampleModalLabel">Nuevo Doctor <span class="fa fa-plus"></span></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <div class="modal-body">
                <form action="#" id="form_nuevo">
                  <div class="row">
                      <div class="form-group col-md-6 col-sm-12">
                          <label for="dni">DNI: <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="dni" id="dni" placeholder="Ingrese DNI" onkeyup="mayus(this);" onkeypress="return validar_numeros(event);" maxlength="15">
                      </div>

                      <div class="form-group col-md-6 col-sm-12">
                          <label for="nombre">Nombre: <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese Nombre" onkeyup="mayus(this);" onkeypress="return validar_saltos(event);" maxlength="30">
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-6 col-sm-12">
                          <label for="apellido">Apellido: <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese Apellido" onkeyup="mayus(this);" onkeypress="return validar_saltos(event);" maxlength="30">
                      </div>
                      
                      <div class="form-group col-md-6 col-sm-12">
                          <label for="telefono">Teléfono:</label>
                          <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese Teléfono" onkeyup="mayus(this);" onkeypress="return validar_numeros(event);" maxlength="15">
                      </div>
                     
                  </div>

                  <div class="row">
                      <div class="form-group col-md-6 col-sm-12">
                          <label for="email">Email:</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese Email" onkeyup="mayus(this);" maxlength="50">
                      </div>

                      <div class="form-group col-md-6 col-sm-12">
                          <label for="direccion">Dirección:</label>
                          <textarea name="direccion" id="direccion_edit" cols="30" rows="2" class="form-control" onkeyup="mayus(this);" onkeypress="return validar_string_direccion(event);" maxlength="50"></textarea>
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
                  <h5 class="modal-title" id="exampleModalLabel">Editar Doctor <span class="fa fa-plus"></span></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <div class="modal-body">
                <form action="#" id="form_update">
                  <div class="row">
                      <div class="form-group col-md-6 col-sm-12">
                          <label for="dni_edit">DNI: <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="dni" id="dni_edit" placeholder="Ingrese DNI" onkeyup="mayus(this);" onkeypress="return validar_numeros(event);" maxlength="15">
                      </div>

                      <div class="form-group col-md-6 col-sm-12">
                          <label for="nombre_edit">Nombre: <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="nombre" id="nombre_edit" placeholder="Ingrese Nombre" onkeyup="mayus(this);" onkeypress="return validar_saltos(event);" maxlength="30">
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-md-6 col-sm-12">
                          <label for="apellido_edit">Apellido: <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="apellido_edit" name="apellido" placeholder="Ingrese Apellido" onkeyup="mayus(this);" onkeypress="return validar_saltos(event);" maxlength="30">
                      </div>
                      
                      <div class="form-group col-md-6 col-sm-12">
                          <label for="telefono_edit">Teléfono:</label>
                          <input type="text" class="form-control" id="telefono_edit" name="telefono" placeholder="Ingrese Teléfono" onkeyup="mayus(this);" onkeypress="return validar_numeros(event);" maxlength="15">
                      </div>
                     
                  </div>

                  <div class="row">
                       <div class="form-group col-md-6 col-sm-12">
                          <label for="telefono_edit">Email:</label>
                          <input type="email" class="form-control" id="email_edit" name="email" placeholder="Ingrese Email" onkeyup="mayus(this);" maxlength="50">
                      </div>

                      <input type="hidden" id="id_doctor" name="id">
                       <div class="form-group col-md-6 col-sm-12">
                          <label for="direccion">Dirección:</label>
                          <textarea name="direccion" id="direccion_edit" cols="30" rows="2" class="form-control" onkeyup="mayus(this);" onkeypress="return validar_string_direccion(event);" maxlength="50"></textarea>
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
                  <h5 class="modal-title" id="exampleModalLabel">Ver Doctor <span class="fa fa-eye"></span></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                              <strong>DNI: </strong><span id="ver_dni"></span>
                        </div>

                        <div class="col-sm-12 mt-3">
                              <strong>NOMBRES: </strong><span id="ver_nombre"></span>
                        </div>

                         <div class="col-sm-12 mt-3">
                              <strong>APELLIDOS: </strong><span id="ver_apellido"></span>
                        </div>

                         <div class="col-sm-12 mt-3">
                              <strong>TELÉFONO: </strong><span id="ver_telefono"></span>
                        </div>

                         <div class="col-sm-12 mt-3">
                              <strong>DIRECCIÓN: </strong><span id="ver_direccion"></span>
                        </div>

                         <div class="col-sm-12 mt-3">
                              <strong>EMAIL: </strong><span id="ver_email"></span>
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
      $('#cargar_tabla').load('includes/tablaDoctores.php');
    }
    cargar_tabla();

    function eliminar(id){
      swal({
      title: 'Eliminar paciente',
      text: "¿Desea eliminar este doctor?",
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
                url:"process/eliminarDoctor.php",
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
        var dni=$('#dni').val();
        var nombre=$('#nombre').val();
        var apellido=$('#apellido').val();
        var telefono=$('#telefono').val();
        var email=$('#email').val();
        var direccion=$('#direccion').val();

        if(dni === ''){
            swal('Error','El campo DNI es requerido','error');
        }else if(nombre === ''){
            swal('Error','El campo Nombre es requerido','error');
        }else if(apellido === ''){
            swal('Error','El campo Apellido es requerido','error');
        }else{

        $.ajax({
          url:"process/guardarDoctor.php",
          type:"POST",
          data:$('#form_nuevo').serialize(),
          success:function(data){
            if(data === '0'){
              swal('Información','El DNI ingresado ya se encuentra registrado, intente nuevamente','warning');
            }else{
              $('#mensaje').html(data);
              $('#ModalNuevo').modal('hide');
              cargar_tabla();
              $('#form_nuevo')[0].reset();
            }
          }
        });

        }

    }

    function editar(id,dni,nombre,apellido,telefono,direccion,email){
        $('#id_doctor').val(id);
        $('#dni_edit').val(dni);
        $('#nombre_edit').val(nombre);
        $('#apellido_edit').val(apellido);
        $('#telefono_edit').val(telefono);
        $('#direccion_edit').val(direccion);
        $('#email_edit').val(email);
        $('#ModalEditar').modal('show');
    }

     function ver(dni,nombre,apellido,telefono,direccion,email){
        $('#ver_dni').html(dni);
        $('#ver_nombre').html(nombre);
        $('#ver_apellido').html(apellido);
        $('#ver_telefono').html(telefono);
        $('#ver_direccion').html(direccion);
        $('#ver_email').html(email);
        $('#ModalVer').modal('show');
    }

     function update(){
        var dni=$('#dni_edit').val();
        var nombre=$('#nombre_edit').val();
        var apellido=$('#apellido_edit').val();
        var email=$('#email_edit').val();
        var telefono=$('#telefono_edit').val();
        var direccion=$('#direccion_edit').val();

        if(dni === ''){
            swal('Error','El campo DNI es requerido','error');
        }else if(nombre === ''){
            swal('Error','El campo Nombre es requerido','error');
        }else if(apellido === ''){
            swal('Error','El campo Apellido es requerido','error');
        }else{

        $.ajax({
          url:"process/updateDoctor.php",
          type:"POST",
          data:$('#form_update').serialize(),
          success:function(data){
            if(data === '0'){
              swal('Información','El DNI ingresado ya se encuentra registrado, intente de nuevo','warning');
            }else{
              $('#mensaje').html(data);
              $('#ModalEditar').modal('hide');
              cargar_tabla();
              $('#form_update')[0].reset();
            }
          }
        });

        }

    }
  </script>
  <script src="<?php echo url; ?>assets/js/funciones.js"></script>
</body>

</html>
