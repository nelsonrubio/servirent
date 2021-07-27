<?php 
include('conexion/conexion.php');
session_start();
$user=$_SESSION['nombreUsuario'];
$tipoUsuario = $_SESSION['tipoUsuario'];
$bodega1 = mysqli_query($con, "select * from bodegas where tipoBodega = 1 ") or
die("Problemas en el select:" . mysqli_error($con));
$bodega2 = mysqli_query($con, "select * from bodegas where tipoBodega = 1 ") or
die("Problemas en el select:" . mysqli_error($con));
$registros = mysqli_query($con, "select * from roles") or
die("Problemas en el select:" . mysqli_error($con));

$articulos = mysqli_query($con, "select * from articulos") or
die("Problemas en el select:" . mysqli_error($con));

$articulos2 = mysqli_query($con, "select * from articulos") or
die("Problemas en el select:" . mysqli_error($con));



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Transferencia de inventario</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
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
            <h1>Transferencia de inventario</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Transferencia de inventario</li>
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
          <form role="form" method="POST" id="bodega" action="procesarTransferenciaInventario.php">
            <div class="row">
              <div class="alert alert-success col-md-12" id="alert" style="display: none;">&nbsp;</div>
            </div>
            <div class="row">
              <div class="col-md-12">
              <div class="form-group">
              <label for="">Bodega principal</label>
                  <select class="form-control tipo" name="principal" id="inicio" style="width: 100%;">
                    <?php
                     while ($reg = mysqli_fetch_array($bodega1)) {
                      echo '<option value='.$reg['idBodega'].'>' . $reg['nombreBodega'] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group fieldGroup">
                  <label for="">Cantidad de articulo</label>
                  <div class="input-group">
                      <input type="text" name="cantidad[]" class="form-control" placeholder="Cantidad" />
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group fieldGroup">
                  <label for="">Nombre de la herramienta</label>
                  <div class="input-group">
                    <select class="form-control cilindro" name="herramienta[]" style="width: 100%;">
                      <?php
                      while ($reg = mysqli_fetch_array($articulos)) {
                        echo '<option value='.$reg['idArticulo'].'>' . $reg['nombreHerramienta'] . " - " . $reg['marca'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group fieldGroup">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar cilindros</a>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Bodega secundaria</label>
                        <select class="form-control tipo" name="secundaria" id="destino" style="width: 100%;">
                          <?php
                          while ($reg2 = mysqli_fetch_array($bodega2)) {
                            echo '<option value='.$reg2['idBodega'].'>' . $reg2['nombreBodega'] . '</option>';
                          }
                          ?>
                        </select>
                    </div>
                  </div>
              </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit " class="btn btn-primary btn-block ">Crear</button>
                </div>
            </div>
          </form>

          <div class="form-group fieldGroupCopy" style="display: none;">
                    <div class="input-group">
                      <div class="col-md-2">
                        <input type="text" name="name[]" class="form-control" placeholder="Cantidad" />
                      </div>
                      <div class="col-md-2">
                        <select class="form-control cilindro" name="email[]" style="width: 100%;">
                          <?php
                          while ($reg3 = mysqli_fetch_array($articulos2)) {
                            echo '<option value='.$reg3['idArticulo'].'>' . $reg3['nombreHerramienta'] . " - " . $reg3['marca'] . '</option>';
                          }
                          ?>
                      </select>
                      </div>
 
                      
                      <div class="col-md-2">
                        <div class="input-group-addon">
                              <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</a>
                          </div>
                      </div>
                        
                    </div>
                </div>
              </div>

          </div>
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
<script>
        $(document).ready(function() {
            //group add limit
            var maxGroup = 30;

            //add more fields group
            $(".addMore").click(function() {
                if ($('body').find('.fieldGroup').length < maxGroup) {
                    var fieldHTML = '<div class="form-group fieldGroup row">' + $(".fieldGroupCopy").html() + '</div>';
                    $('body').find('.fieldGroup:last').after(fieldHTML);
                } else {
                    alert('Maximum ' + maxGroup + ' groups are allowed.');
                }
            });

            //remove fields group
            $("body").on("click", ".remove", function() {
                $(this).parents(".fieldGroup").remove();
            });
        });
    </script>
<!-- Bootstrap -->
<!--<script src="plugins/bodegas/crearBodega.js"></script>-->
<script src="plugins/jquery-validation/jquery.validate.min.js "></script>
<script src="plugins/jquery-validation/additional-methods.min.js "></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

</body>
</html>
