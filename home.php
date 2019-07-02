
<?php include('includes/header.php'); 
$count=mysqli_query($con,"SELECT COUNT(*) FROM pacientes WHERE status=1");
$pacount=mysqli_fetch_array($count);

$count2=mysqli_query($con,"SELECT COUNT(*) FROM doctores WHERE status=1");
$doccount=mysqli_fetch_array($count2);

$count3=mysqli_query($con,"SELECT COUNT(*) FROM consultas WHERE status=1");
$concount=mysqli_fetch_array($count3);
?>

<body id="page-top">

  <div id="wrapper">
    <?php include('includes/aside.php'); ?>


    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        
        <?php include('includes/navbar.php'); ?>
       
        <div class="container-fluid">

          <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pacientes</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($pacount[0]);?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Doctores</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($doccount[0]);?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-md fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

           
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Consultas</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($concount[0]);?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-address-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
              
          </div>
            
        </div>

      </div>
<?php include('includes/footer.php'); ?>

