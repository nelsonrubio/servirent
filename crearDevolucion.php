<?php 
include('conexion/conexion.php');
session_start();
$user=$_SESSION['nombreUsuario'];
$tipoUsuario = $_SESSION['tipoUsuario'];
$registros = mysqli_query($con, "select * from tipobodega") or
die("Problemas en el select:" . mysqli_error($con));

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <style>
    .ocultar{
      display: none !important
    }
  </style>

  <title>Crear devolucion</title>

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
            <h1>Crear devolucion</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Crear devolucion</li>
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
          <form role="form" >
            <div class="row">
              <div class="alert alert-success col-md-12" id="alert" style="display: none;">&nbsp;</div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label for="">Numero de nota</label>
                <div class="form-group">
                  <input type="text" name="bodega" id="nroNota" class="form-control" placeholder="Numero de nota">
                </div>
              </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <input class="btn btn-primary btn-block" id="buscarNota" value="Buscar" />
                </div>
            </div>
          </form>
        </div>
      </div>
      <div class="card card-default ocultar" id="tabla">
          <!-- /.card-header -->
          <div class="card-body">
            <h5 id="titulo"></h5>
            <div class="row">
              <div class="col-md-12">
                  <table id="tablaInfo" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Nro. Nota</th>
                            <th>Nombre Alquilino</th>
                            <th>Rut</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Responsable de la obra</th>
                            <th>Opcion</th>
                          </tr>
                        </thead>
                        <tbody id="cuerpo">
                        </tbody>
                    </table>
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
      $( "#buscarNota" ).click(function() {
        let nroNota = $("#nroNota").val();
        $("#cuerpo").html("");
        $.ajax({
                  type:'POST',
                  url:'obtenerNota.php',
                  dataType: "json",
                  data:{id:nroNota},
                  success:function(data){
                    console.log(data);
                    
                      if(data.status == 'ok'){
                        var element = document.getElementById("tabla");
                        element.classList.remove("ocultar");
                        data.result.map(function (info, index, array) {
                            console.log(info);
                            let opcion = `<a href='verNota.php?id=`+info.idcabeceranota+`' class ='btn btn-primary' data-toggle='tooltip' data-placement='top' title='Ver'><i class='fas fa-eye' title='Guardar'></i></a>
                            <a href=''class ='btn btn-primary' data-toggle='tooltip' data-placement='top' title='Ver'><i class='fas fa-eye' title='Guardar'></i></a>`;
                            
                            var tr = `<tr>
                                <td>`+info.idcabeceranota+`</td>
                                <td>`+info.nombreAlquilino+` </td>
                                <td>`+info.rut+`</td>
                                <td>`+info.direccion+`</td>
                                <td>`+info.telefono+`</td>
                                <td>`+info.responsableObra+`</td>
                                <td>`+opcion+`</td>
                          </tr>`;
                        $("#cuerpo").append(tr)
                        });
                      }else{
                        $("#cuerpo").html("");
                      } 
                  }
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
