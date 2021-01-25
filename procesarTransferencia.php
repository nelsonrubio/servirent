<?php
include('conexion/conexion.php');
$BodegaInicio = $_POST['inicio']; 
$inventarioInicio = $_POST['inventarioInicio'];
$BodegaFinal = $_POST['destino'];
$cilindro = $_POST['cilindro'];
$empresa = $_POST['empresa'];
$tipo = $_POST['tipo'];
$total = 0;
$deducion = 0;
//echo $BodegaInicio ." - ".$inventarioInicio." - ".$BodegaFinal." - ".$cilindro." - ".$empresa." - ".$tipo." - ";
$registros = mysqli_query($con, "select * from detallebodega where idBodega = $BodegaInicio and  pesoCilindro = $cilindro") or
die("Problemas en el select 5:" . mysqli_error($con));
$registros2 = mysqli_query($con, "select * from detallebodega where idBodega = $BodegaFinal and  pesoCilindro = $cilindro") or
die("Problemas en el select 4:" . mysqli_error($con));

$registros3 = mysqli_query($con, "select * from bodegas where idBodegas = $BodegaInicio ") or
die("Problemas en el select 5:" . mysqli_error($con));
$cabecerainicio = mysqli_fetch_array($registros3);
$registros4 = mysqli_query($con, "select * from bodegas where idBodegas = $BodegaFinal ") or
die("Problemas en el select 4:" . mysqli_error($con));
$cabecerafinal = mysqli_fetch_array($registros4);

if($reg = mysqli_fetch_array($registros)) {
    if($inventarioInicio > $reg['cantidad'] ){
        echo 2;
    }else if($BodegaInicio == $BodegaFinal){
        echo 3;
    }
    else{
        if($reg2 = mysqli_fetch_array($registros2) ){
            $idBodegaUpdate = $reg2['idBodega'];
            $total = $reg2['cantidad'] + $inventarioInicio;
            $deducion = $reg['cantidad'] - $inventarioInicio;
            $totalCabeceraInicio = $cabecerainicio['inventario'] - $inventarioInicio;
            $totalFinal = $cabecerafinal['inventario'] + $inventarioInicio;
            mysqli_query($con, "update detallebodega set cantidad = $total where idBodega = $idBodegaUpdate and pesoCilindro = $cilindro")or
            die("Problemas en el select 1:" . mysqli_error($con));
            mysqli_query($con, "update detallebodega set cantidad = $deducion where idBodega = $BodegaInicio and pesoCilindro = $cilindro")or
            die("Problemas en el select 2:" . mysqli_error($con));

            mysqli_query($con, "update bodegas set inventario = $totalCabeceraInicio where idBodegas = $BodegaInicio")or
            die("Problemas en el select 2:" . mysqli_error($con));

            mysqli_query($con, "update bodegas set inventario = $totalFinal where idBodegas = $BodegaFinal")or
            die("Problemas en el select 2:" . mysqli_error($con));
            echo 4;

        }
    }
}

?>