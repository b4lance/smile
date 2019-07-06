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
          <h1 class="h3 mb-0 text-gray-800">Control Diario</h1>
         
          </div>
          <div id="mensaje"></div>
          
          <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">Total del Día <?php echo date('d-m-Y'); ?></div>
                    <div class="card-body">
                        <div class="row">
                           <div class="col-sm-12" id="cargar_hoy">
                             
                           </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>

          <div class="row mt-5">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">Listado de Control</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12" id="cargar_tabla"></div>
                        </div>
                    </div>
                </div>
            </div>
          </div>


        <!-- Modal Ver-->
          <div class="modal fade" id="ModalVer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                  <h5 class="modal-title" id="exampleModalLabel">Ver Detalles del Control <span class="fa fa-eye"></span></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12" id="cargar_detalles">
                        
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
      $('#cargar_tabla').load('includes/tabla_diaria.php');
    }

     function cargar_tabla2(){
      $('#cargar_hoy').load('includes/tabla_del_dia.php');
    }
    cargar_tabla();
    cargar_tabla2();

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

     function confirmar(){
      swal({
      title: 'Confirmar el Pago diario',
      text: "¿Desea Confirmar el pago día?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, confirmar',
      cancelButtonText: 'No, cancelar!',
      confirmButtonClass: 'btn btn-danger',
      cancelButtonClass: 'btn btn-primary',
      buttonsStyling: false
      }).then(function () {
            $.ajax({
                url:"process/ConfirmarPago.php",
                type:"POST",
                success:function(respuesta){
                    $('#mensaje').html(respuesta);
                    cargar_tabla();
                    cargar_tabla2();
                }
            });
            return true;    
      }, function (dismiss) {
    })
    }

   function ver(id){
      $('#cargar_detalles').load('includes/cargar_detalles_pago.php',{id:id});
      $('#ModalVer').modal('show');
   }
  </script>
  <script src="<?php echo url; ?>assets/js/funciones.js"></script>
</body>

</html>
