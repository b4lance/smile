<?php 
require_once 'config/conexion.php';
session_start();
if(isset($_SESSION['id_usuario'])){
  header("location:home.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Smile</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo url; ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?php echo url; ?>assets/css/sb-admin-2.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo url; ?>assets/css/sweetalert2.min.css">
</head>

<body class="bg-gradient-primary">

  <div class="container mt-5">
    <div id="mensaje"></div>
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Smile <img src="" alt=""></h1>
                  </div>
                  <form class="user" id="form-login">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Usuario" id="usuario" name="usuario">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" placeholder="Contraseña" id="password" name="password">
                    </div>
                  
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Iniciar Sesión
                    </button>
                    <hr>
                   
                  </form>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Olvidastes Password?</a>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <script src="<?php echo url; ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo url; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo url; ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo url; ?>assets/js/sb-admin-2.min.js"></script>
  <script src="<?php echo url; ?>assets/js/sweetalert2.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#form-login').submit(function(event){ 
        event.preventDefault();
        $.ajax({
          url:'process/login.php',
          method:'POST',
          data:$('#form-login').serialize(),
          success:function(data){
              $('#form-login')[0].reset();
              $('#mensaje').html(data);
          }
        });
      });
     });
  </script>
</body>

</html>
