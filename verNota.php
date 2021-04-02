<?php 
include('conexion/conexion.php');
session_start();
$user=$_SESSION['nombreUsuario'];
$tipoUsuario = $_SESSION['tipoUsuario'];
$id = $_REQUEST['id'];
$nota = mysqli_query($con, "select * from cabeceranota where idcabeceranota = $id") or
die("Problemas en el select:" . mysqli_error($con));
$info = mysqli_fetch_array($nota);
$detallenota = mysqli_query($con, "select * from detallenota where idcabeceranota = $id") or
die("Problemas en el select:" . mysqli_error($con));

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Crear nota</title>

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
            <h1>Nota de pedido</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Crear nota</li>
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
          <form role="form" method="POST" action="procesarCotizacion.php">
            <label for="">Datos de la nota</label>
            <div class="row">
              <div class="col-md-6">
                <label for="">Nombre</label>
                <div class="form-group">
                    <input type="text" name="nombre" class="form-control descripcion" id="descripcion" value="<?php echo $info['nombreAlquilino'];?>" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <label for="">Razon social</label>
                <div class="form-group">
                    <input type="text" name="rut" class="form-control descripcion" id="descripcion" value="<?php echo $info['rut'];?>" disabled>
                </div>
              </div>
              <div class="alert alert-success col-md-12" id="alert" style="display: none;">&nbsp;</div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="">Direccion</label>
                <div class="form-group">
                  <input type="text" name="direccion" class="form-control usuario" id="descripcion" value="<?php echo $info['direccion'];?>" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <label for="">Telefono</label>
                <div class="form-group">
                   <input type="number" name="telefono" class="form-control rut" id="porcentaje" placeholder="Telefono" value="<?php echo $info['telefono'];?>" disabled>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="">Nombre de la obra</label>
                <div class="form-group">
                  <input type="text" name="obra" class="form-control usuario" id="descripcion" placeholder="Nombre de obra" value="<?php echo $info['nombreObra'];?>" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <label for="">Responsable de la obra</label>
                <div class="form-group">
                   <input type="text" name="responsable" class="form-control rut" id="porcentaje" placeholder="Responsable" value="<?php echo $info['responsableObra'];?>" disabled>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label for="">Fecha inicio</label>
                <div class="form-group">
                  <input type="text" name="fechaInicio" class="form-control usuario" id="datepicker" placeholder="Fecha inicio" value="<?php echo $info['fechaInicio'];?>" disabled>
                </div>
              </div>
              <div class="col-md-6">
                <label for="">Fecha fin</label>
                <div class="form-group">
                   <input type="text" name="fechaFin" class="form-control rut" id="fechaFin" placeholder="Fecha final" value="<?php echo $info['fechaFin'];?>" disabled>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
              <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Articulo</th>
                    <th>Tipo de alquiler</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                  </tr>
                  </thead>
                  <tbody>
 
                    <?php
                        while ($reg2 = mysqli_fetch_array($detallenota)) {
                            $estado = $reg2['statusherramienta'];
                            $idArticulo = $reg2['modeloarticulo'];
                            $estatus = mysqli_query($con, "select * from estatus where idEstatus = $estado") or
                            die("Problemas en el select:" . mysqli_error($con));
                            $reg3 = mysqli_fetch_array($estatus);
                            $herramienta = mysqli_query($con, "select * from articulos where idArticulo = $idArticulo") or
                            die("Problemas en el select:" . mysqli_error($con));
                            $reg4 = mysqli_fetch_array($herramienta);
                          
                                echo'<tr>';
                                echo '<td>' . $reg4['nombreHerramienta'] . '</td>';
                                echo '<td>' . $reg2['alquiler'] . '</td>';
                                echo '<td>' . $reg2['cantidad'] . '</td>';
                                echo '<td>' . $reg3['estatus'] . '</td>';
                                 
        
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

          </form>



          <div class="form-group fieldGroupCopy" style="display: none;">
                    <div class="input-group">
                      
                      <div class="col-md-3">
                          <select class="form-control cilindro" name="articulo[]" style="width: 100%;">
                          <?php
                          while ($reg2 = mysqli_fetch_array($articulo)) {
                            echo '<option value='.$reg2['idArticulo'].'>' . $reg2['marca'] . " - " . $reg2['modelo'] . '</option>';
                          }
                          ?>
                        </select>
                      </div>
                      <div class="col-md-3">
                      <select class="form-control cilindro" name="alquiler[]" style="width: 100%;">
                        <option value='dia'>Por dia</option>
                        <option value='hora'>Por hora</option>
                        <option value='semana'>Por semana</option>
                        <option value='mes'>Por mes</option>
                    </select>
                      </div>
                      <div class="col-md-3">
                        <input type="text" name="cantidad[]" class="form-control" placeholder="Cantidad" />
                      </div>
                    
                      
                      <div class="col-md-3">
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
<script src="plugins/jquery/jquery.min.js"></script>
<script>

$(document).ready(function() {
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
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->

<!-- Bootstrap -->
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
