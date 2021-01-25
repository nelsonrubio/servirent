<?php
include('conexion/conexion.php');

    $idBodega = $_POST['bodega'];
    $registros = mysqli_query($con, "select * from bodegas where idBodegas = $idBodega ") or
    die("Problemas en el select:" . mysqli_error($con));

    if($reg = mysqli_fetch_array($registros) ){
        echo $reg['inventario'];
    }

?>