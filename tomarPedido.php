<?php 
include('conexion/conexion.php');
session_start();
$user=$_SESSION['nombreUsuario'];
$tipoUsuario = $_SESSION['tipoUsuario'];
$bodega = mysqli_query($con, "select * from bodegas where tipoBodega = 2") or
die("Problemas en el select:" . mysqli_error($con));
$usuario = mysqli_query($con, "select * from usuarios where tipoUsuario = 3") or
die("Problemas en el select:" . mysqli_error($con));
$cilindros = mysqli_query($con, "select * from cilindros") or
die("Problemas en el select:" . mysqli_error($con));
$tipoCilindro = mysqli_query($con, "select * from tipoCilindro") or
die("Problemas en el select:" . mysqli_error($con));
$cilindros2 = mysqli_query($con, "select * from cilindros") or
die("Problemas en el select:" . mysqli_error($con));
$tipoCilindro2 = mysqli_query($con, "select * from tipoCilindro") or
die("Problemas en el select:" . mysqli_error($con));
$pago = mysqli_query($con, "select * from metodospago") or
die("Problemas en el select:" . mysqli_error($con));
$cupon = mysqli_query($con, "select * from cupones") or
die("Problemas en el select:" . mysqli_error($con));
$status = mysqli_query($con, "select * from estatuspedidos") or
die("Problemas en el select:" . mysqli_error($con));
$empresa = mysqli_query($con, "select * from empresascilindros") or
die("Problemas en el select:" . mysqli_error($con));
$empresa2 = mysqli_query($con, "select * from empresascilindros") or
die("Problemas en el select:" . mysqli_error($con));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Toma de pedido</title>

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
            <h1>Toma de pedido</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Toma de pedido</li>
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
          <form role="form" method="POST" id="registroPedido" action="procesarPedido.php">
            <label for="">Datos de pedido</label>
            <div class="row">
              <div class="alert alert-success col-md-12" id="alert" style="display: none;">&nbsp;</div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Nombre del cliente</label>
                  <input type="text" name="usuario" class="form-control usuario" placeholder="Nombre de cliente">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Telefono del cliente</label>
                   <input type="text" name="rut" class="form-control rut" placeholder="Telefono">
                </div>
              </div>
            </div>
            <hr />
            <div class="row">
              <div class="col-md-3">
                <div class="form-group fieldGroup">
                  <label for="">Cantidad de cilindros</label>
                  <div class="input-group">
                      <input type="text" name="name[]" class="form-control" placeholder="Cantidad" />
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group fieldGroup">
                  <label for="">Cilindro</label>
                  <div class="input-group">
                    <select class="form-control cilindro" name="email[]" style="width: 100%;">
                      <?php
                      while ($reg = mysqli_fetch_array($cilindros)) {
                        echo '<option value='.$reg['idCilindro'].'>' . $reg['tipoCilindro'] . "Kg - $" . $reg['precio'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group fieldGroup">
                  <label for="">Empresa de cilindros</label>
                  <div class="input-group">
                    <select class="form-control cilindro" name="empresa[]" style="width: 100%;">
                      <?php
                      while ($reg4 = mysqli_fetch_array($empresa)) {
                        echo '<option value='.$reg4['idEmpresa'].'>' . $reg4['nombreEmpresa'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group fieldGroup">
                  <label for="">Tipo de cilindros</label>
                  <div class="input-group">
                    <select class="form-control cilindro" name="tipo[]" style="width: 100%;">
                        <?php
                        while ($reg2 = mysqli_fetch_array($tipoCilindro)) {
                          echo '<option value='.$reg2['idTipo'].'>' . $reg2['nombreTipo'] . '</option>';
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
            <hr />
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Bodega</label>
                  <select class="form-control bodega" name="bodega" style="width: 100%;">
                    <?php
                     while ($reg2 = mysqli_fetch_array($bodega)) {
                      echo '<option value='.$reg2['idBodegas'].'>' . $reg2['nombreBodega'] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                <label for="">Chofer</label>
                  <select class="form-control chofer" name="chofer" style="width: 100%;">
                    <?php
                     while ($reg3 = mysqli_fetch_array($usuario)) {
                      echo '<option value='.$reg3['idUsuario'].'>' . $reg3['nombreUsuario'] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <label for="">Metodo de pago</label> <br />
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                   <select class="form-control pago" name="metodoPago" style="width: 100%;">
                        <?php
                        while ($reg5 = mysqli_fetch_array($pago)) {
                          echo '<option value='.$reg5['idPago'].'>' . $reg5['nombrePago'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
              </div>
              <div class="col-md-12">
                <label for="">Cupon de descuento</label>
                <div class="form-group">
                   <select class="form-control pago" name="cupon" style="width: 100%;">
                        <option value="0">Selecione un cupon</option>
                        <?php
                        while ($reg6 = mysqli_fetch_array($cupon)) {
                          echo '<option value='.$reg6['idCupon'].'>' . $reg6['descripcion'] . " - $" . $reg6['porcentaje'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                  <label for="">Direccion</label>
                    <textarea class="form-control direccion" name="direccion" rows="3" placeholder="Direccion"></textarea>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                  <label for="">Estado del pedido</label>
                  <select class="form-control pago" name="estatus" style="width: 100%;">
                        <option value="0">Selecione un cupon</option>
                        <?php
                        while ($reg7 = mysqli_fetch_array($status)) {
                          echo '<option value='.$reg7['idEstatus'].'>' . $reg7['nombreEstatus'] . '</option>';
                        }
                        ?>
                    </select><br />
                    <strong>NOTA: Debe seleccionar un estado de pedido para continuar</strong>
                  </div>
                </div>
            </div>
            <label class="invisible" for="">Observaciones</label>
            <div class="row invisible">
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control observaciones" name="observacion" rows="3" placeholder="Observaciones"></textarea>
                  </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button type="submit " name="submit" class="btn btn-primary btn-block ">Registrar pedido</button>
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
                          while ($reg3 = mysqli_fetch_array($cilindros2)) {
                            echo '<option value='.$reg3['idCilindro'].'>' . $reg3['tipoCilindro'] . "Kg - $" . $reg3['precio'] . '</option>';
                          }
                          ?>
                      </select>
                      </div>
                      <div class="col-md-2">
                        <select class="form-control cilindro" name="empresa[]" style="width: 100%;">
                          <?php
                          while ($reg5 = mysqli_fetch_array($empresa2)) {
                            echo '<option value='.$reg5['idEmpresa'].'>' . $reg5['nombreEmpresa'] . '</option>';
                          }
                          ?>
                        </select>
                      </div>
                      <div class="col-md-2">
                        <select class="form-control cilindro" name="tipo[]" style="width: 100%;">
                          <?php
                          while ($reg2 = mysqli_fetch_array($tipoCilindro2)) {
                            echo '<option value='.$reg2['idTipo'].'>' . $reg2['nombreTipo'] . '</option>';
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
<!--<script src="plugins/tomaPedido/index.js"></script>-->
<script src="plugins/jquery-validation/jquery.validate.min.js "></script>
<script src="plugins/jquery-validation/additional-methods.min.js "></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>
 
</body>
</html>
