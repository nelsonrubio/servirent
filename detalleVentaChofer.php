<?php 
include('conexion/conexion.php');
session_start();
$user=$_SESSION['nombreUsuario'];
$tipoUsuario = $_SESSION['tipoUsuario'];
$idPedido = $_GET['id'];
$estatus = mysqli_query($con, "select * from  estatuspedidos") or
die("Problemas en el select:" . mysqli_error($con));
$pedido = mysqli_query($con, "select * from pedidos where idPedido = $idPedido") or
die("Problemas en el select:" . mysqli_error($con));
$pedi = mysqli_fetch_array($pedido);
$idBodega = $pedi['idBodegas'];
$idChofer = $pedi['idChofer'];
$bodegas = mysqli_query($con, "select * from bodegas where idBodegas = $idBodega") or
die("Problemas en el select:" . mysqli_error($con));
$bode = mysqli_fetch_array($bodegas);

$chofer = mysqli_query($con, "select * from usuarios where tipoUSuario = 3 and idUsuario = $idChofer") or
die("Problemas en el select:" . mysqli_error($con));
$cho = mysqli_fetch_array($chofer);
 
$detallePedido = mysqli_query($con, "select * from detallepedido where idPedido = $idPedido") or
die("Problemas en el select:" . mysqli_error($con));

$metodo = mysqli_query($con, "select * from pagopedido where idPedido = $idPedido") or
die("Problemas en el select:" . mysqli_error($con));

$pago = mysqli_query($con, "select * from metodospago") or
die("Problemas en el select:" . mysqli_error($con));

$pago2 = mysqli_query($con, "select * from metodospago") or
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

    <!-- SEARCH FORM -->
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
     
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
          <form role="form" method="POST" action="actualizarPEdido.php" id="registroPedido">
            <label for="">Datos de pedido</label>
            <div class="row">
              <div class="alert alert-success col-md-12" id="alert" style="display: none;">&nbsp;</div>
            </div>
            <div class="row">
              <div class="col-md-6">
              <label for="">Nombre del cliente</label>
                <div class="form-group">
                  <input type="text" name="usuario" class="form-control usuario" placeholder="Nombre de cliente" value = "<?php echo $pedi['nombreCliente'];?>" disabled>
                </div>
              </div>
              <div class="col-md-6">
              <label for="">Telefono del cliente</label>
                <div class="form-group">
                   <input type="text" name="rut" class="form-control rut" placeholder="Telefono" value = "<?php echo $pedi['rut'];?>" disabled>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
              <label for="">Bodega</label>
                <div class="form-group">
                    <input type="text" name="cantidad" class="form-control cantidad" placeholder="Cantidad" value= "<?php echo $bode['nombreBodega'];?>" disabled>
                </div>
              </div>

              <div class="col-md-6">
              <label for="">Chofer</label>
                <div class="form-group">
                    <input type="text" name="cantidad" class="form-control cantidad" placeholder="Cantidad" value= "<?php echo $cho['nombreUsuario'];?>" disabled>
                </div>
              </div>
            </div>
            <label for="">Cilindros facturados</label> <br />
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Cilindro</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Empresa de cilindros</th>
                    <th>Tipo de cilindro</th>
                  </tr>
                  </thead>
                  <tbody>
 
                    <?php
                    $total= 0;
                        while ($reg10 = mysqli_fetch_array($detallePedido)) {
                          $total += $reg10['cantidad'] * $reg10['precio'];
                            echo'<tr>';
                                echo '<td>' . $reg10['cilindro'] .'Kg</td>';
                                echo '<td>' . $reg10['cantidad'] . '</td>';  
                                echo '<td>$'.$reg10['cantidad'] * $reg10['precio'].'</td>';
                                echo '<td>'.$reg10['empresaCilindro'].'</td>';
                                echo '<td>'.$reg10['tipoCilindro'].'</td>';  
                        
                    ?>
                         </tr>
                    <?php
                    }
                    ?>
                  </tr> 
                  </tbody>
                   
                </table>
                <strong>Total a pagar: $<?php echo $total; ?></strong>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                <label for="">Detalle de pago</label>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Monto</th>
                    <th>Metodo</th>
                     
                  </tr>
                  </thead>
                  <tbody>
 
                    <?php
                    $total= 0;
                        while ($reg10 = mysqli_fetch_array($metodo)) {
                    
                            echo'<tr>';
                                echo '<td>' . $reg10['monto'] .'</td>';
                                echo '<td>' . $reg10['metodo'] . '</td>';  
                                
                        
                    ?>
                         </tr>
                    <?php
                    }
                    ?>
                  </tr> 
                  </tbody>
                </table>
               
                </div>
              </div>
             
              <div class="col-md-12">
                <label for="">Direccion</label>
                  <div class="form-group">
                    <textarea class="form-control direccion" name="observacion" rows="3" placeholder="Direccion" value="" disabled><?php echo $pedi['direccion'] ?></textarea>
                  </div>
                </div>
            </div>
            <label class=" " for="">Observaciones</label>
            <div class="row  ">
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control observaciones" name="observacion" rows="3" placeholder="Observaciones" id="observacion" ><?php echo $pedi['observaciones'] ?></textarea>
                  </div>
                </div>
            </div>
             
       
       
          
          </form>
          <div class="form-group fieldGroupCopy" style="display: none;">
                    <div class="input-group">
                      <div class="col-md-4">
                        <input type="text" name="name[]" class="form-control" placeholder="Cantidad" />
                      </div>
                       
                       
                      <div class="col-md-4">
                        <select class="form-control cilindro" name="email[]" style="width: 100%;">
                          <?php
                          while ($reg2 = mysqli_fetch_array($pago2)) {
                            echo '<option value='.$reg2['idPago'].'>' . $reg2['nombrePago'] . '</option>';
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
<!--<script src="plugins/tomaPedido/tomarPedido.js"></script>
<script src="plugins/jquery-validation/jquery.validate.min.js "></script>
<script src="plugins/jquery-validation/additional-methods.min.js "></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>

  AdminLTE -->
<script src="dist/js/adminlte.js"></script>
 
</body>
</html>
