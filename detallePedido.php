<?php 
include('conexion/conexion.php');
session_start();
$user=$_SESSION['nombreUsuario'];
$tipoUsuario = $_SESSION['tipoUsuario'];
$idPedido = $_GET['id'];
$estatus = mysqli_query($con, "select * from  estatus") or
die("Problemas en el select:" . mysqli_error($con));
$pedido = mysqli_query($con, "select * from cabeceranota where idcabeceranota = $idPedido") or
die("Problemas en el select:" . mysqli_error($con));
$pedi = mysqli_fetch_array($pedido);
 
$idChofer = $pedi['idChofer'];
 
 

$chofer = mysqli_query($con, "select * from usuarios where tipoUSuario = 4 and idUsuario = $idChofer") or
die("Problemas en el select:" . mysqli_error($con));
$cho = mysqli_fetch_array($chofer);

 

$detallePedido = mysqli_query($con, "select * from detallenota where iddetallenota = $idPedido  ") or
die("Problemas en el select:" . mysqli_error($con));
 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Detalle pedido</title>

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
            <h1>Detalle de nota</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detalle de nota</li>
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
          <form role="form" method="POST" id="registroPedido">
            <label for="">Datos de nota</label>
            <div class="row">
              <div class="alert alert-success col-md-12" id="alert" style="display: none;">&nbsp;</div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="">Nombre del cliente</label>
                  <input type="text" name="usuario" class="form-control usuario" placeholder="Nombre de cliente" value = "<?php echo $pedi['nombreAlquilino'];?>" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label for="">Telefono del cliente</label>
                   <input type="text" name="rut" class="form-control rut" placeholder="Telefono" value = "<?php echo $pedi['telefono'];?>" disabled>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Articulo</th>
                    <th>Cantidad</th>
                    <th>Tipo de alquiler</th>
                    <th>Precio</th>
                    
                  </tr>
                  </thead>
                  <tbody>
 
                    <?php
                    $total= 0;
                        while ($reg10 = mysqli_fetch_array($detallePedido)) {
                          $idArticulo = $reg10['modeloarticulo'];
                          $articulo = mysqli_query($con, "select * from articulos where idArticulo = $idArticulo") or
                          die("Problemas en el select:" . mysqli_error($con));
                          $art = mysqli_fetch_array($articulo);
              
                            echo'<tr>';
                                echo '<td>' . $art['nombreHerramienta'] .'Kg</td>';
                                echo '<td>' . $reg10['cantidad'] . '</td>';  
                                echo '<td> '. $reg10['alquiler']. '</td>';
                                if($reg10['alquiler'] == 'mes'){
                                  echo '<td>$'. $art['PrecioMes']. '</td>';
                                  $total += $reg10['cantidad'] * $art['PrecioMes'];
                                }
                                else if($reg10['alquiler'] == 'hora'){
                                  echo '<td>$'. $art['PrecioHora']. '</td>';
                                  $total += $reg10['cantidad'] * $art['PrecioHora'];
                                }
                                else if($reg10['alquiler'] == 'dia'){
                                  echo '<td>$'. $art['PrecioDia']. '</td>';
                                  $total += $reg10['cantidad'] * $art['PrecioDia'];
                                }
                                else if($reg10['alquiler'] == 'semana'){
                                  echo '<td>$'. $art['PrecioSemana']. '</td>';
                                  $total += $reg10['cantidad'] * $art['PrecioSemana'];
                                }
                              
                         
                        
                    ?>
                         </tr>
                    <?php
                    }
                    ?>
                  </tr> 
                  </tbody>
                   
                </table>
                <strong>Total a pagar: $<?php echo $total; ?></strong>

                <div class="row"><br />
                  <label for="">Estatus del pedido</label>
                    <div class="col-md-12">
                      <div class="form-group">
                        <select class="form-control tipo" name="tipo" style="width: 100%;">
                          <option></option>
                          <?php
                          while ($reg5 = mysqli_fetch_array($estatus)) {
                            echo '<option value='.$reg5['idEstatus'].'>' . $reg5['estatus'] . '</option>';
                          }
                          ?>
                        </select>
                      </div>
                  </div>
                </div>
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
<script src="plugins/tomaPedido/index.js"></script>
<script src="plugins/jquery-validation/jquery.validate.min.js "></script>
<script src="plugins/jquery-validation/additional-methods.min.js "></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>
 
</body>
</html>
