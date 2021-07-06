<?php
include('conexion/conexion.php');
 
$estatus = $_POST['estatus'];
$idPedido = $_POST['idPedido'];
 //echo $estatus;
 //echo $idPedido;
//echo "select * from cabeceranota where idcabeceranota = $idPedido ";
$pedidos = mysqli_query($con, "select * from cabeceranota where idcabeceranota = $idPedido ") or
die("Problemas en el select ccccccccccccccccccc:" . mysqli_error($con));
$reg = mysqli_fetch_array($pedidos);
$idBodega = $reg['idBodega'];

$pedidos = mysqli_query($con, "select * from detallenota where idcabeceranota = $idPedido ") or
die("Problemas en el select ttttttttt:" . mysqli_error($con));

while($infoUpdate = mysqli_fetch_array($pedidos)){
    $modeloarticulo = $infoUpdate['modeloarticulo'];
    //echo "select * from detallenota where idBodega = $idBodega and  modeloarticulo = $modeloarticulo";
    $update = mysqli_query($con, "select * from detallenota where idcabeceranota = $idPedido and  modeloarticulo = $modeloarticulo") or
    die("Problemas en el select bbbbbbbbbb:" . mysqli_error($con));
    $reg20 = mysqli_fetch_array($update);
    $idArticulo = $reg20['modeloarticulo'];

    if($estatus == "3"){
        $articulo = mysqli_query($con, "select * from articulos where idBodega = $idBodega and  idArticulo = $idArticulo") or
        die("Problemas en el select <<<<<<<<:" . mysqli_error($con));
        $reg21 = mysqli_fetch_array($articulo);
    
        $descontarIventario =  $reg21['cantidad'] - $reg20['cantidad'] ;

        mysqli_query($con, "update articulos set cantidad= $descontarIventario where idBodega= $idBodega and idArticulo = $idArticulo") or
        die("Problemas en el selectzzzzzzzzzz:" . mysqli_error($con));


    }
}


        
mysqli_query($con, "update cabeceranota set estatusNota= 3 where idcabeceranota= $idPedido") or
die("Problemas en el select:" . mysqli_error($con));
echo '<script> alert("Registro completado, por favor acepte para continuar..."); window.location = "listadiPedidoChofer.php";</script>';

?>