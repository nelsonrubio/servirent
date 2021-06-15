<?php 
include('conexion/conexion.php');
session_start();
$idConstructora = $_GET['id'];
$user=$_SESSION['nombreUsuario'];
$tipoUsuario = $_SESSION['tipoUsuario'];
$registros = mysqli_query($con, "select * from constructora where idConstructoras = $idConstructora") or
die("Problemas en el select:" . mysqli_error($con));
$constructora = mysqli_fetch_array($registros);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Editar Constructora</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css" integrity="sha512-YdYyWQf8AS4WSB0WWdc3FbQ3Ypdm0QCWD2k4hgfqbQbRCJBEgX0iAegkl2S1Evma5ImaVXLBeUkIlP6hQ1eYKQ==" crossorigin="anonymous" />
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
 
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        
      </li>
    </ul>

    <!-- SEARCH FORM -->
   
    <!-- Right navbar links -->
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
  include("menu.php");
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar constructora</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Editar constructora</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <!-- /.card-header -->
          <div class="card-body">
          <form role="form" method="POST" id="bodega" action="procesarEdicionConstructora.php">
            <div class="row">
              <div class="alert alert-success col-md-12" id="alert" style="display: none;">&nbsp;</div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <label for="">Nombre de constructora</label>
                <div class="form-group">
                  <input type="text" name="nombreConstructora" id="nombreObra" class="form-control" placeholder="Nombre de la constructora" value="<?php echo $constructora['nombreConstructora'];?>">
                  <input type="hidden" name="id" value="<?php echo $idConstructora;?>">
                </div>
              </div>
              <div class="col-md-4">
                <label for="">Direccion de la constructora</label>
                <div class="form-group">
                  <input type="text" name="direccion" id="nombreObra" class="form-control" placeholder="Direccion de la constructora" value="<?php echo $constructora['direccion'];?>">
                  <input type="hidden" name="tipoBodega" value="1">
                </div>
              </div>
              <div class="col-md-4">
                <label for="">Telefono de la constructora</label>
                <div class="form-group">
                  <input type="text" name="telefono" id="nombreObra" class="form-control" placeholder="Telefono de la constructora" value="<?php echo $constructora['telefono'];?>">
                  <input type="hidden" name="tipoBodega" value="1">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label for="">Responsable de la constructora</label>
                <div class="form-group">
                  <input type="text" name="responsable" id="nombreObra" class="form-control" placeholder="Responsable de la constructora" value="<?php echo $constructora['responsable'];?>">
                  <input type="hidden" name="tipoBodega" value="1">
                </div>
              </div>
              
              <div class="col-md-6">
                <label for="">Correo de la constructora</label>
                <div class="form-group">
                  <input type="text" name="correo" id="nombreObra" class="form-control" placeholder="Email" value="<?php echo $constructora['correo'];?>">
                  <input type="hidden" name="tipoBodega" value="1">
                </div>
              </div>
            </div>

            
            <div class="row">
                <div class="col-md-12">
                    <button type="submit " class="btn btn-primary btn-block ">Editar</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

       
<!-- Bootstrap -->
<!--<script src="plugins/bodegas/crearBodega.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js" integrity="sha512-RCgrAvvoLpP7KVgTkTctrUdv7C6t7Un3p1iaoPr1++3pybCyCsCZZN7QEHMZTcJTmcJ7jzexTO+eFpHk4OCFAg==" crossorigin="anonymous"></script>
<script src="plugins/cilindros/index.js"></script>
<script src="plugins/jquery-validation/jquery.validate.min.js "></script>
<script src="plugins/jquery-validation/additional-methods.min.js "></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

</body>
</html>