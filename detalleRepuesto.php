<?php 
include('conexion/conexion.php');
session_start();
$id = $_GET['id'];
$user=$_SESSION['nombreUsuario'];
$tipoUsuario = $_SESSION['tipoUsuario'];
$detalle = mysqli_query($con, "select * from repuesto where idBodega = $id") or
die("Problemas en el select:" . mysqli_error($con));
$bodega = mysqli_query($con, "select * from bodegas where idBodega = $id") or
die("Problemas en el select:" . mysqli_error($con));
$reg2 = mysqli_fetch_array($bodega);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Listado de bodega</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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
            <h1>Detalle de bodega: <?php echo $reg2['nombreBodega'];?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">detalle de bodegas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
              <div class="alert alert-success" id="alert" style="display: none;">&nbsp;</div>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Codigo origen</th>
                    <th>Codigo  interno</th>
                    <th>Proveedor</th>
                    <th>Stock</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Precio venta</th>
 
                  </tr>
                  </thead>
                  <tbody>
 
                    <?php
                        while ($reg = mysqli_fetch_array($detalle)) {
                          if($reg['cantidad'] <= $reg['stock']){
                            echo'<tr style="background-color: #ea6262;">';
                                echo '<td>' . $reg['nombreRepuesto'] . '</td>';
                                echo '<td>'.$reg['codOrigen'].' </td>';
                                echo '<td>'.$reg['CodInterno'].'</td>';
                                echo'<td>'.$reg['proveedor'].'</td>';
                                echo'<td>'.$reg['stock'].'</td>';    
                                echo'<td>'.$reg['cantidad'].'</td>'; 
                                echo'<td>'.$reg['precio'].'</td>'; 
                                echo'<td>'.$reg['precioVenta'].'</td>'; 
                            echo '</tr>';
                          }else{
                            echo'<tr>';
                              echo '<td>' . $reg['nombreRepuesto'] . '</td>';
                              echo '<td>'.$reg['codOrigen'].' </td>';
                              echo '<td>'.$reg['CodInterno'].'</td>';
                              echo'<td>'.$reg['proveedor'].'</td>';
                              echo'<td>'.$reg['stock'].'</td>';    
                              echo'<td>'.$reg['cantidad'].'</td>'; 
                              echo'<td>'.$reg['precio'].'</td>'; 
                              echo'<td>'.$reg['precioVenta'].'</td>'; 
                            echo '</tr>';
                          }
                        }
                        
                    ?> 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="plugins/listadoBodegas/listadoBodegas.js"></script>
<script>

</script>
</body>
</html>
