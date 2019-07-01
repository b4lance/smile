<?php include('includes/header.php'); ?>

<body id="page-top">

  <div id="wrapper">
    
    <?php include('includes/aside.php'); ?>


    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
  
        <?php include('includes/navbar.php'); ?>

        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Servicios</h1>
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
                  <h5 class="modal-title" id="exampleModalLabel">Nuevo Servicio <span class="fa fa-plus"></span></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <div class="modal-body">
                <form action="#" id="form_nuevo">
                  <div class="row">
                      <div class="form-group col-md-6 col-sm-12">
                          <label for="nombre">Nombre: <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese Nombre" onkeyup="mayus(this);" onkeypress="return validar_saltos(event);" maxlength="30">
                      </div>

                      <div class="form-group col-sm-12 col-md-6">
                              <label for="precio">Precio: <span class="text-danger">*</span></label>
                              <input type="text" id="precio" name="precio" class="form-control" onkeypress="return validar_numeros_puntos(event);" maxlength="15">
                      </div>

                     
                  </div>

                  <div class="row">
                       <div class="form-group col-sm-12">
                          <label for="descripcion">Descripción:</label>
                          <textarea name="descripcion" id="descripcion" cols="30" rows="2" class="form-control" onkeyup="mayus(this);" onkeypress="return validar_string_direccion(event);" maxlength="50"></textarea>
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
                  <h5 class="modal-title" id="exampleModalLabel">Editar Servicio <span class="fa fa-plus"></span></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <div class="modal-body">
                <form action="#" id="form_update">
                  <div class="row">
                      <div class="form-group col-md-6 col-sm-12">
                          <label for="nombre_edit">Nombre: <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="nombre" id="nombre_edit" placeholder="Ingrese Nombre" onkeyup="mayus(this);" onkeypress="return validar_saltos(event);" maxlength="30">
                      </div>

                       <div class="form-group col-sm-12 col-md-6">
                              <label for="precio_edit">Precio: <span class="text-danger">*</span></label>
                              <input type="text" id="precio_edit" name="precio" class="form-control" onkeypress="return validar_numeros_puntos(event);" maxlength="15">
                      </div>
                  </div>    

                  <div class="row">
                      <div class="form-group col-sm-12">
                          <label for="descripcion_edit">Descripción:</label>
                          <textarea name="descripción" id="descripcion_edit" cols="30" rows="2" class="form-control" onkeyup="mayus(this);" onkeypress="return validar_string_direccion(event);" maxlength="50"></textarea>

                          <input type="hidden" name="id" id="id_servicio">
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

          
        </div>

      </div>
     
<?php include('includes/footer.php'); ?>

  <script>
    function cargar_tabla(){
      $('#cargar_tabla').load('includes/tablaServicios.php');
    }
    cargar_tabla();

    function eliminar(id){
      swal({
      title: 'Eliminar Servicio',
      text: "¿Desea eliminar este servicio?",
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
                url:"process/eliminarServicio.php",
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
        var precio=$('#precio').val();
        var descripcion=$('#descripcion').val();
     

        if(nombre === ''){
            swal('Error','El campo Nombre es requerido','error');
        }else if(precio === ''){
            swal('Error','El campo Precio es requerido','error');
        }else{

        $.ajax({
          url:"process/guardarServicio.php",
          type:"POST",
          data:$('#form_nuevo').serialize(),
          success:function(data){
            $('#mensaje').html(data);
            $('#ModalNuevo').modal('hide');
            cargar_tabla();
            $('#form_nuevo')[0].reset();
          }
        });

        }

    }

    function editar(id,nombre,precio,descripcion){
        $('#id_servicio').val(id);
        $('#nombre_edit').val(nombre);
        $('#precio_edit').val(precio);
        $('#descripcion_edit').val(descripcion);
        
        $('#ModalEditar').modal('show');
    }


     function update(){
        var nombre=$('#nombre_edit').val();
        var precio=$('#precio_edit').val();
        var descripcion=$('#descripcion_edit').val();
        

        if(nombre === ''){
            swal('Error','El campo Nombre es requerido','error');
        }else if(precio === ''){
            swal('Error','El campo Precio es requerido','error');
        }else{

        $.ajax({
          url:"process/updateServicio.php",
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
  </script>
  <script src="<?php echo url; ?>assets/js/funciones.js"></script>
</body>

</html>
