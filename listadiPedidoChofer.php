<?php 
include('conexion/conexion.php');
session_start();
$user=$_SESSION['nombreUsuario'];
$userId = $_SESSION['idUsuario'];
$tipoUsuario = $_SESSION['tipoUsuario'];
$pedidos = mysqli_query($con, "select * from pedidos where  idChofer = $userId and tipoVenta = 1 ORDER by idPedido DESC") or
die("Problemas en el select:" . mysqli_error($con));
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Listado pedido</title>
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
            <h1>Lista de pedidos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lista de pedidos</li>
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
                    <th>Cliente</th>
                    <th>Telefono</th>
                    <th>Cantidad</th>
                    <th>Bodega</th>
                    <th>Chofer</th>
                    <th>Estatus</th>
                    <th>Fecha</th>
                    <th>Hora de pedido</th>
                    <th>Hora de entrega</th>
                    <th>Opciones</th>
                  </tr>
                  </thead>
                  <tbody>
 
                    <?php
                        while ($reg = mysqli_fetch_array($pedidos)) {
                          $id = $reg['idPedido'];
                          $bodega = $reg['idBodegas'];
                          $chofer = $reg['idChofer'];
                          $estatus1 = $reg['estatusPedido'];

                          $bodega = mysqli_query($con, "select * from bodegas where idBodegas= $bodega ") or
                                    die("Problemas en el select:" . mysqli_error($con));
                                    $bod = mysqli_fetch_array($bodega);
                          $chofer = mysqli_query($con, "select * from usuarios where idUsuario = $chofer ") or
                                    die("Problemas en el select:" . mysqli_error($con));
                                    $cho = mysqli_fetch_array($chofer);
                          $estatus = mysqli_query($con, "select * from estatuspedidos where idEstatus = $estatus1 ") or
                                    die("Problemas en el select:" . mysqli_error($con));
                                    $sta = mysqli_fetch_array($estatus);
                     ?>
                     <?php
                        if($estatus1 == 6){
                            echo'<tr style = "background-color: #B6FD7C">';
                                echo '<td>' . $reg['nombreCliente'] . '</td>';
                                echo '<td>' . $reg['rut'] . '</td>';  
                                echo '<td>'.$reg['TotalCilindro'].'</td>';
                                echo '<td>'.$bod['nombreBodega'].'</td>';
                                echo '<td>'.$cho['nombreUsuario'].'</td>';
                                echo '<td>'.$sta['nombreEstatus'].'</td>';
                                echo '<td>'.$reg['fechaPedido'].'</td>';
                                echo '<td>'.$reg['horaPedido'].'</td>';
                                echo '<td>'.$reg['horaEntrega'].'</td>';
                    
                                
                                echo '<td>';
                                  
                                    if($tipoUsuario == 1) {
                                  
                                   echo"<a href='detallePedido.php?id=<?php echo $id;?> 'class ='btn btn-primary' ><i class='fas fa-eye' title='Editar'></i></a>";
                                  
                                    }else{
                                  ?>
                                    <a href="detallePedidoChofer.php?id=<?php echo $id;?> "class ="btn btn-primary" ><i class='fas fa-eye' title='Editar'></i></a>
                                  <?php
                                    }
                                  ?>
                                </td>
                            </tr>
                            <?php
                          }
                          else if($estatus1 == 4){
                            echo'<tr style = "background-color: #FC7270">';
                            echo '<td>' . $reg['nombreCliente'] . '</td>';
                            echo '<td>' . $reg['rut'] . '</td>';  
                            echo '<td>'.$reg['TotalCilindro'].'</td>';
                            echo '<td>'.$bod['nombreBodega'].'</td>';
                            echo '<td>'.$cho['nombreUsuario'].'</td>';
                            echo '<td>'.$sta['nombreEstatus'].'</td>';
                            echo '<td>'.$reg['fechaPedido'].'</td>';
                            echo '<td>'.$reg['horaPedido'].'</td>';
                            echo '<td>'.$reg['horaEntrega'].'</td>';
                
                            
                            echo '<td>';
                              
                                if($tipoUsuario == 1) {
                              
                               echo"<a href='detallePedido.php?id=<?php echo $id;?> 'class ='btn btn-primary' ><i class='fas fa-eye' title='Editar'></i></a>";
                              
                                }else{
                              ?>
                                <a href="detallePedidoChofer.php?id=<?php echo $id;?> "class ="btn btn-primary" ><i class='fas fa-eye' title='Editar'></i></a>
                              <?php
                                }
                              ?>
                            </td>
                        </tr>
                        <?php
                          }else if($estatus1 == 1){
                            echo'<tr style = "background-color: #F8FB89">';
                            echo '<td>' . $reg['nombreCliente'] . '</td>';
                            echo '<td>' . $reg['rut'] . '</td>';  
                            echo '<td>'.$reg['TotalCilindro'].'</td>';
                            echo '<td>'.$bod['nombreBodega'].'</td>';
                            echo '<td>'.$cho['nombreUsuario'].'</td>';
                            echo '<td>'.$sta['nombreEstatus'].'</td>';
                            echo '<td>'.$reg['fechaPedido'].'</td>';
                            echo '<td>'.$reg['horaPedido'].'</td>';
                            echo '<td>'.$reg['horaEntrega'].'</td>';
                
                            
                            echo '<td>';
                              
                                if($tipoUsuario == 1) {
                              
                               echo"<a href='detallePedido.php?id=<?php echo $id;?> 'class ='btn btn-primary' ><i class='fas fa-eye' title='Editar'></i></a>";
                              
                                }else{
                              ?>
                                <a href="detallePedidoChofer.php?id=<?php echo $id;?> "class ="btn btn-primary" ><i class='fas fa-eye' title='Editar'></i></a>
                              <?php
                                }
                              ?>
                            </td>
                        </tr>
                        <?php
                          }
                        }
                    ?>
                  </tr> 
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
<script src="plugins/listadoUsuarios/index.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script>

</script>
</body>
</html>
