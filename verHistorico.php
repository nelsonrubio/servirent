<?php 
include('conexion/conexion.php');
session_start();
$user=$_SESSION['nombreUsuario'];
$tipoUsuario = $_SESSION['tipoUsuario'];
$idArticulo = $_GET['id'];
 
$detalle = mysqli_query($con, "select * from detallenota where modeloarticulo = $idArticulo") or 
die("Problemas en el select: " . mysqli_error($con));
$repuesto = mysqli_query($con, "select * from devolucion where idarticulo = $idArticulo") or 
die("Problemas en el select: " . mysqli_error($con));

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Reporte estatus</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
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
            <h1>Reporte Estatus</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Reporte estatus</li>
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
          <form role="form" method="POST" id="registroCupones">
            <label for="">Reporte Estatus</label>
            <div class="row">
              <div class="col-md-12">
              <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
              <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Articulos en obras</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Articulos en reparacion</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
              <div class="tab-content" id="custom-tabs-three-tabContent">
                  <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Nro. Nota</th>
                        <th>Nombre alquilino</th>
                        <th>rut</th>
                        <th>Direccion</th>
                        <th>Fecha nota</th>
 
                    </tr>
                    </thead>
                    <tbody>
    
                        <?php
                            while ($reg = mysqli_fetch_array($detalle)) {
                            $idcabeceranota = $reg['idcabeceranota'];
               
                            $nota = mysqli_query($con, "select * from cabeceranota where idcabeceranota = $idcabeceranota") or 
                            die("Problemas en el select: " . mysqli_error($con));
                            $reg23 = mysqli_fetch_array($nota);
                            echo'<tr>';
                            echo '<td>' . $reg23['idcabeceranota'] . '</td>';
                            echo '<td>' . $reg23['nombreAlquilino'] . '</td>';  
 
                            echo '<td>'.$reg23['rut'].'</td>';
                            echo'<td>'.$reg23['direccion'].'</td>'; 
                            echo'<td>'.$reg23['fechaInicio'].'</td>';   
                            echo'</tr>';
                        }
                        ?>
                    </tr> 
                    </tbody>
                    
                </table> 
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Nro. devolucion</th>
                        <th>Nro. Nota</th>
                        <th>Articulo</th>
                        <th>Descripcion</th>
                        <th>Fecha de Creacion</th>
                        <th>Estatus</th>
                    </tr>
                    </thead>
                    <tbody>
    
                        <?php
                            while ($reg2 = mysqli_fetch_array($repuesto)) {
                            $id = $reg2['idDevolucion'];
                            $id2= $reg2['idcabeceranota'];
                            $idArticulo= $reg2['idarticulo'];
                            $idStatus = $reg2['statusDevolucion'];
                            $estatus = mysqli_query($con, "select * from articulos where idArticulo = $idArticulo") or
                            die("Problemas en el select:" . mysqli_error($con));
                            $reg3 = mysqli_fetch_array($estatus);

                            $estado = mysqli_query($con, "select * from estatusdevolucion where idEstatus = $idStatus") or
                            die("Problemas en el select:" . mysqli_error($con));
                            $reg4 = mysqli_fetch_array($estado);
                                echo'<tr>';
                                echo '<td>' . $reg2['idDevolucion'] . '</td>';
                                echo '<td>' . $reg2['idcabeceranota'] . '</td>';
                                echo '<td>' . $reg3['nombreHerramienta'] . '</td>';
                                echo '<td>' . $reg2['nota'] . '</td>';
                                echo '<td>' . $reg2['fechaDevolucion'] . '</td>';
                                echo '<td>' . $reg4['estatus'] . '</td>';
                                echo'</tr>';
                                
                                
                                
                        }
                        ?>
                    </tr> 
                    </tbody>
                    
                </table> 
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>

              </div>
            </div>
          </form>
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
<!-- Bootstrap -->
<script src="plugins/reporteEstatus/index.js"></script>
<script src="plugins/jquery-validation/jquery.validate.min.js "></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js "></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>

<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>
 
</body>
</html>
