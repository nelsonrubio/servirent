<?php
include('conexion/conexion.php');
$observacion = $_POST['observacion'];
$estatus = $_POST['estatus'];
$devolucion = $_POST['devolucion'];
$idPedido = $_POST['idPedido'];
$nameArr = $_POST['name'];
$emailArr = $_POST['email'];
 

$pedidos = mysqli_query($con, "select * from pedidos where idPedido = $idPedido ") or
die("Problemas en el select:" . mysqli_error($con));
$reg = mysqli_fetch_array($pedidos);
$idBodega = $reg['idBodegas'];

$bodegaInventario = mysqli_query($con, "select * from bodegas where idBodegas = $idBodega ") or
die("Problemas en el select:" . mysqli_error($con));
$regInvetario = mysqli_fetch_array($bodegaInventario);

$TotalPedido = $regInvetario['inventario'] - $reg['TotalCilindro'];



$pedidos = mysqli_query($con, "select * from detallepedido where idPedido = $idPedido ") or
die("Problemas en el select:" . mysqli_error($con));

while($infoUpdate = mysqli_fetch_array($pedidos)){
    $idCilindro = $infoUpdate['cilindro'];

    $update = mysqli_query($con, "select * from detallebodega where idBodega = $idBodega and  pesoCilindro = $idCilindro") or
    die("Problemas en el select:" . mysqli_error($con));
    $reg20 = mysqli_fetch_array($update);

    if($estatus == "6"){
        $descontarIventario =  $reg20['cantidad'] - $infoUpdate['cantidad'] ;

        mysqli_query($con, "update detallebodega set cantidad= $descontarIventario where idBodega= $idBodega and pesoCilindro = $idCilindro") or
        die("Problemas en el select:" . mysqli_error($con));
    }
}

if(!empty($nameArr)){
    for($i = 0; $i < count($nameArr); $i++)
    {
        if(!empty($nameArr[$i]))
        {
            $monto = $nameArr[$i];
            $metodoPago = $emailArr[$i];
            $fechaActual = date('d-m-Y');
            $inicioFecha = strtotime($fechaActual);
            $newFecha = date('Y-m-d', $inicioFecha);
            $metodoPagoTipo = mysqli_query($con, "select * from metodospago where idPago = $metodoPago") or
            die("Problemas en el select:" . mysqli_error($con));
            $detPago = mysqli_fetch_array($metodoPagoTipo);
            $nombrePago = $detPago['nombrePago'];

            mysqli_query($con, "insert into pagopedido(idPedido,monto,metodo,fechaPago) 
                                values ($idPedido,$monto,'$nombrePago','$newFecha')") or 
            die("Problemas en el select" . mysqli_error($con));

           
        }
    }
     
   
    }



//echo "update pedidos set observaciones='$observacion', estatusPedido=$estatus, cilindroDevueltos = $devolucion  where idPedido=$idPedido";
date_default_timezone_set("America/Santiago");
        $horaPedido = date("h:i:sa");
mysqli_query($con, "update pedidos set observaciones='$observacion', estatusPedido=$estatus, cilindroDevueltos = $devolucion, horaEntrega = '$horaPedido'  where idPedido=$idPedido") or
        die("Problemas en el select:" . mysqli_error($con));
        mysqli_query($con, "update bodegas set inventario=$TotalPedido where idBodegas=$idBodega") or
        die("Problemas en el select:" . mysqli_error($con));
        echo '<script> alert("Registro completado, por favor acepte para continuar..."); window.location = "listadiPedidoChofer.php";</script>';
        if(mysqli_affected_rows($con)){
            echo 2;
        }else{
            echo 3;
        }

?>