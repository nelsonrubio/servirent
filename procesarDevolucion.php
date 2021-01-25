<?php
include('conexion/conexion.php');

$descripcion = $_POST['descripcion'];
$cantidad = $_POST['fecha'];
$chofer = $_POST['chofer'];
$bodega = $_POST['idBodega'];

$fechaActual = date('d-m-Y');
$inicioFecha = strtotime($fechaActual);
$newFecha = date('Y-m-d', $inicioFecha);


//echo "insert into cabeceradevolucion(descripcionDevolucion,cantidadDevolucion,idChofer,fechaDevolucion,idBodega) values ('$descripcion', $cantidad, $chofer,'$newFecha',$bodega)";


mysqli_query($con, "insert into cabeceradevolucion(descripcionDevolucion,cantidadDevolucion,idChofer,fechaDevolucion,idBodega) 
                    values ('$descripcion', $cantidad, $chofer,'$newFecha',$bodega)") or 
                    die("Problemas en el select" . mysqli_error($con));

?>