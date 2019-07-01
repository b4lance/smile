<?php include('includes/header.php'); ?>

<body id="page-top">

  <div id="wrapper">
    
    <?php include('includes/aside.php'); ?>


    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
  
        <?php include('includes/navbar.php'); ?>

        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
          <button class="btn btn-sm btn-primary" style="background: none;border: none;" data-toggle="modal" data-target="#ModalNuevo" title="Nuevo Personal">
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
                  <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario <span class="fa fa-plus"></span></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <div class="modal-body">
                <form action="#" id="form_nuevo">
                  <div class="row">
                      <div class="form-group col-sm-12 col-md-6">
                          <label for="nombre">Nombre: <span class="text-danger">*</span></label>
                          <input type="text" id="nombre" name="nombre" class="form-control" onkeyup="mayus(this);" onkeypress="return validar_saltos(event);" maxlength="30">
                      </div>

                      <div class="form-group col-sm-12 col-md-6">
                          <label for="usuario">Usuario: <span class="text-danger">*</span></label>
                          <input type="text" id="usuario" name="usuario" class="form-control" onkeypress="return validar_string(event);" maxlength="10">
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-sm-12 col-md-4">
                          <label for="rol">Rol: <span class="text-danger">*</span></label>
                          <select name="rol" id="rol" class="form-control">
                              <option value="">Selecciona</option>
                              <option value="Administrador">Administrador</option>
                              <option value="Doctor">Doctor</option>
                          </select>
                      </div>

                      <div class="form-group col-sm-12 col-md-4">
                          <label for="password">Contraseña: <span class="text-danger">*</span></label>
                          <input type="password" id="password" name="password" class="form-control">
                      </div>

                      <div class="form-group col-sm-12 col-md-4">
                          <label for="confirmar_password">Confirmar Contraseña: <span class="text-danger">*</span></label>
                          <input type="password" id="confirmar_password" name="confirmar_password" class="form-control">
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
                  <h5 class="modal-title" id="exampleModalLabel">Editar Usuario <span class="fa fa-plus"></span></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <div class="modal-body">
                <form action="#" id="form_update">
                  <div class="row">
                      <div class="form-group col-sm-12 col-md-6">
                          <label for="nombre_edit">Nombre: <span class="text-danger">*</span></label>
                          <input type="text" id="nombre_edit" name="nombre" class="form-control" onkeyup="mayus(this);" onkeypress="return validar_saltos(event);" maxlength="30">
                      </div>

                      <div class="form-group col-sm-12 col-md-6">
                          <label for="usuario_edit">Usuario: <span class="text-danger">*</span></label>
                          <input type="text" id="usuario_edit" name="usuario" class="form-control" onkeypress="return validar_string(event);" maxlength="10">
                      </div>
                  </div>

                  <div class="row">
                      <div class="form-group col-sm-12 col-md-4">
                          <label for="rol_edit">Rol: <span class="text-danger">*</span></label>
                          <select name="rol" id="rol_edit" class="form-control">
                              <option value="">Selecciona</option>
                              <option value="Administrador">Administrador</option>
                              <option value="Doctor">Doctor</option>
                          </select>
                      </div>

                      <div class="form-group col-sm-12 col-md-4">
                          <label for="password_edit">Contraseña: </label>
                          <input type="password" id="password_edit" name="password" class="form-control" maxlength="8">
                      </div>

                      <div class="form-group col-sm-12 col-md-4">
                          <label for="confirmar_password_edit">Confirmar Contraseña: </label>
                          <input type="password" id="confirmar_password_edit" name="confirmar_password" class="form-control" maxlength="8">
                      </div>
                  </div>
                  <input type="hidden" id="id_usuario" name="id">
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


      </div>
     
<?php include('includes/footer.php'); ?>

  <script>
    function cargar_tabla(){
      $('#cargar_tabla').load('includes/tablaUsuarios.php');
    }
    cargar_tabla();

    function eliminar(id){
      swal({
      title: 'Eliminar Usuario',
      text: "¿Desea eliminar este usuario?",
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
                url:"process/eliminarUsuario.php",
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
        var nombre=$('#nombre').val();
        var usuario=$('#usuario').val();
        var rol=$('#rol').val();
        var password=$('#password').val();
        var confirmar_password=$('#confirmar_password').val();

        if(nombre === ''){
            swal('Error','El campo Nombre es requerido','error');
        }else if(usuario === ''){
            swal('Error','El campo Usuario es requerido','error');
        }else if(rol === ''){
            swal('Error','El campo Rol es requerido','error');
        }else if(password === ''){
            swal('Error','El campo Contraseña es requerido','error');
        }else if(password != confirmar_password){
            swal('Error','Las Contraseñas no coinciden, intente de nuevo','error');
        }else{

        $.ajax({
          url:"process/guardarUsuario.php",
          type:"POST",
          data:$('#form_nuevo').serialize(),
          success:function(data){
              if(data === '0'){
                swal('Información','El usuario ingresado ya se encuentra registrado, intente de nuevo','warning');
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

    function editar(id,nombre,usuario,rol){
        $('#id_usuario').val(id);
        $('#nombre_edit').val(nombre);
        $('#usuario_edit').val(usuario);
        $('#rol_edit').val(rol);
        $('#ModalEditar').modal('show');
    }

   
     function update(){
        var nombre=$('#nombre_edit').val();
        var usuario=$('#usuario_edit').val();
        var rol_edit=$('#rol_edit').val();
       

        if(nombre === ''){
            swal('Error','El campo Nombre es requerido','error');
        }else if(usuario === ''){
            swal('Error','El campo Usuario es requerido','error');
        }else if(rol === ''){
            swal('Error','El campo Rol es requerido','error');
        }else{

        $.ajax({
          url:"process/updateUsuario.php",
          type:"POST",
          data:$('#form_update').serialize(),
          success:function(data){
            if(data === '0'){
              swal('Información','El usuario ingresado ya se encuentra registrado, intente de nuevo','warning');
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
