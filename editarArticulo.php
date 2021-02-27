<?php 
include('conexion/conexion.php');
session_start();
$user=$_SESSION['nombreUsuario'];
$tipoUsuario = $_SESSION['tipoUsuario'];
 $idArticulo = $_GET['id'];
$registros = mysqli_query($con, "select * from articulos where idArticulo = $idArticulo") or
die("Problemas en el select:" . mysqli_error($con));
$reg = mysqli_fetch_array($registros)
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Editar articulo</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css" integrity="sha512-YdYyWQf8AS4WSB0WWdc3FbQ3Ypdm0QCWD2k4hgfqbQbRCJBEgX0iAegkl2S1Evma5ImaVXLBeUkIlP6hQ1eYKQ==" crossorigin="anonymous" />
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
            <h1>Editar articulo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Editar articulo</li>
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
          <form role="form" method="POST" id="registro">
            <label for="">Datos del articulo</label>
            <div class="row">
              <div class="col-md-6">
                <label for="">Nombre del articulo</label>
                <div class="form-group">
                    <input type="text" name="nombre" class="form-control nombre" id="nombre" placeholder="Nombre del articulo" value="<?php echo $reg['nombreHerramienta'];?>">
                    <input type="hidden" name="id" class="form-control id" id="id" placeholder="Nombre del articulo" value="<?php echo $reg['idArticulo'];?>">
                </div>
              </div>
              <div class="col-md-6">
                <label for="">Marca de la herramienta</label>
                <div class="form-group">
                    <input type="text" name="marca" class="form-control marca" id="marca" placeholder="Marca de la herramienta" value="<?php echo $reg['marca'];?>">
                </div>
              </div>
              <div class="alert alert-success col-md-12" id="alert" style="display: none;">&nbsp;</div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="">Modelo de la herramienta</label>
                <div class="form-group">
                  <input type="text" name="modelo" class="form-control modelo" id="modelo" placeholder="Modelo de la herramienta" value="<?php echo $reg['modelo'];?>">
                </div>
              </div>
              <div class="col-md-6">
                <label for="">Numero de serie</label>
                <div class="form-group">
                   <input type="number" name="serie" class="form-control serie" id="serie" placeholder="Numero de serie" value="<?php echo $reg['nroSerie'];?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="">Precio por dia</label>
                <div class="form-group">
                  <input type="text" name="precioDia" class="form-control precioDia" id="precioDia" placeholder="Precio por dia" value="<?php echo $reg['PrecioDia'];?>">
                </div>
              </div>
              <div class="col-md-6">
                <label for="">Precio por hora</label>
                <div class="form-group">
                   <input type="number" name="precioHora" class="form-control precioHora" id="precioHora" placeholder="Precio por hora" value="<?php echo $reg['PrecioHora'];?>">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label for="">Precio por semana</label>
                <div class="form-group">
                  <input type="text" name="precioSemana" class="form-control precioSemana" id="precioSemana" placeholder="Precio por semana" value="<?php echo $reg['PrecioSemana'];?>">
                </div>
              </div>
              <div class="col-md-6">
                <label for="">Precio por mes</label>
                <div class="form-group">
                   <input type="number" name="precioMes" class="form-control precioMes" id="precioMes" placeholder="Precio por mes" value="<?php echo $reg['PrecioMes'];?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="">Fecha de compra</label>
                <div class="form-group">
                  <input type="text" name="fechaCompra" class="form-control fechaCompra" id="fechaCompra" placeholder="Fecha de compra" value="<?php echo $reg['fechaCompra'];?>">
                </div>
              </div>
              <div class="col-md-6">
                <label for="">Numero de factura</label>
                <div class="form-group">
                   <input type="number" name="nroFactura" class="form-control nroFactura" id="nroFactura" placeholder="Numero de factura" value="<?php echo $reg['NroFactura'];?>">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label for="">Proveedor</label>
                <div class="form-group">
                  <input type="text" name="proveedor" class="form-control proveedor" id="proveedor" placeholder="Proveedor" value="<?php echo $reg['Proveedor'];?>">
                </div>
              </div>
              <div class="col-md-6">
                <label for="">Codigo del equipo</label>
                <div class="form-group">
                   <input type="number" name="codigoEquipo" class="form-control codigoEquipo" id="codigoEquipo" placeholder="Codigo del equipo" value="<?php echo $reg['CodigoEquipo'];?>">
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-12">
                <label for="">Nota</label>
                <div class="form-group">
                <textarea class="form-control nota" name="nota" id="nota" ><?php echo $reg['nota'];?></textarea>
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button type="submit " class="btn btn-primary btn-block ">Editar  articulo</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js" integrity="sha512-RCgrAvvoLpP7KVgTkTctrUdv7C6t7Un3p1iaoPr1++3pybCyCsCZZN7QEHMZTcJTmcJ7jzexTO+eFpHk4OCFAg==" crossorigin="anonymous"></script>
<script src="plugins/crearArticulo/editarArticulo.js"></script>
<script src="plugins/jquery-validation/jquery.validate.min.js "></script>
<script src="plugins/jquery-validation/additional-methods.min.js "></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>
 
</body>
</html>
