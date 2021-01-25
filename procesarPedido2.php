<?php
include('conexion/conexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Registro de usuarios</title>

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

<?php

if(isset($_POST['submit'])){
    $total = 0;
    $totalCilindro = 0;
    $nameArr = $_POST['name'];
    $emailArr = $_POST['email'];
    $tipoArr = $_POST['tipo'];
    $empresaArr = $_POST['empresa'];

    $cliente = $_POST['usuario'];
    $tlf = $_POST['rut'];
    $bodega = $_POST['bodega'];
    $chofer = $_POST['chofer'];
    $direccion = $_POST['direccion'];
    $pago = 0;
    $cupon = $_POST['cupon'];
    $estatus = 1;

    if(!empty($nameArr)){
        for($i = 0; $i < count($nameArr); $i++){
            if(!empty($nameArr[$i])){
                $name = $nameArr[$i];
                $email = $emailArr[$i];
                $tipo = $tipoArr[$i];
                $precio = mysqli_query($con, "select * from cilindros where idCilindro = $email") or
                die("Problemas en el select:" . mysqli_error($con));
                $reg = mysqli_fetch_array($precio);
                $valor =  $reg['precio'] * $name;
                $total = $total + $valor;
                $totalCilindro = $totalCilindro + $name;
               // echo $name;
                //echo $email;
                //echo $tipo."\n";
                
                //database insert query goes here
            }
        }
        if($_POST['cupon'] == 0){
             $descuento = $total;
        }
        else{
            $cuponD = mysqli_query($con, "select * from cupones where idCupon = $cupon") or
            die("Problemas en el select:" . mysqli_error($con));
            $reg1 = mysqli_fetch_array($cuponD);
            $descuento = $total - $reg1['porcentaje'];
            //echo $descuento."\n";
            //echo $cupon;
        }
        $fechaActual = date('d-m-Y');
        $inicioFecha = strtotime($fechaActual);
        $newFecha = date('Y-m-d', $inicioFecha);
        date_default_timezone_set("America/Santiago");
        $horaPedido = date("h:i:sa");
        /*echo "insert into pedidos(nombreCliente,rut,idBodegas,idChofer,metodoPago,fechaPedido,estatusPedido,direccion,total,idCupon) 
        values ('$_POST[usuario]','$tlf',$bodega,$chofer,$pago,'$newFecha',1,'$direccion',$total,$cupon)";*/
        mysqli_query($con, "insert into pedidos(nombreCliente,rut,idBodegas,idChofer,metodoPago,fechaPedido,estatusPedido,direccion,total,idCupon,totalDescuento,TotalCilindro,horaPedido,tipoVenta) 
        values ('$_POST[usuario]','$tlf',$bodega,$chofer,$pago,'$newFecha',$estatus,'$direccion',$total,$cupon, $descuento, $totalCilindro, '$horaPedido',2)") or 
        die("Problemas en el select" . mysqli_error($con));
        if(mysqli_affected_rows($con)){
            $idCabeceraPedido = mysqli_insert_id($con);
            //echo $idCabeceraPedido;
            for($i = 0; $i < count($nameArr); $i++){
                if(!empty($nameArr[$i])){
                    $cantidad = $nameArr[$i];
                    $cilindro = $emailArr[$i];
                    $tipo = $tipoArr[$i];
                    $empresa = $empresaArr[$i];
                    $cilindroDetalle = mysqli_query($con, "select * from cilindros where idCilindro = $cilindro") or
                    die("Problemas en el select:" . mysqli_error($con));
                    $detCilindro = mysqli_fetch_array($cilindroDetalle);

                    $tipoCilindro = mysqli_query($con, "select * from tipoCilindro where idTipo = $tipo") or
                    die("Problemas en el select:" . mysqli_error($con));
                    $typeCilindro = mysqli_fetch_array($tipoCilindro);

                    $empresaCilindro =mysqli_query($con, "select * from empresascilindros where idEmpresa = $empresa") or
                    die("Problemas en el select:" . mysqli_error($con));
                    $Empre = mysqli_fetch_array($empresaCilindro);

                    $nombreCilindro = $detCilindro['tipoCilindro'];
                    $precioCilindro = $detCilindro['precio'];
                    $cilindroType = $typeCilindro['nombreTipo'];
                    $cilindroEmpresa = $Empre['nombreEmpresa'];

                    /*echo "insert into detallepedido(idPedido,cantidad,precio,cilindro,tipoCilindro,empresaCilindro) 
                    values ($idCabeceraPedido, $cantidad, $precioCilindro,'$nombreCilindro','$cilindroType','$cilindroEmpresa')";*/

                    mysqli_query($con, "insert into detallepedido(idPedido,cantidad,precio,cilindro,tipoCilindro,empresaCilindro) 
                    values ($idCabeceraPedido, $cantidad, $precioCilindro,'$nombreCilindro','$cilindroType','$cilindroEmpresa')") or 
                    die("Problemas en el select" . mysqli_error($con));
                    echo '<script> alert("Registro completado, por favor acepte para continuar..."); window.location = "registrarVentas.php";</script>';
                    //database insert query goes here
                }
            }
        
        }else{
            echo"No se puedo crear el usuario.";
        }
    }
}



?>

 
<script src="plugins/jquery/jquery.min.js"></script>
 
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
