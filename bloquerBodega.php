<?php
include('conexion/conexion.php');
    $cantidad = $_GET['cantidad'];
    $bodega = $_GET['id'];
    if($cantidad > 0){
        echo '<script> alert("No se puede suspender bodega que contengan existencia..."); window.location = "listadoBodega.php";</script>';
    }
    else{
        mysqli_query($con, "update bodegas
                          set hidden = 1 
                          where idBodega=$bodega") or
        die("Problemas en el select:" . mysqli_error($con));
        if(mysqli_affected_rows($con)){
            echo '<script> alert("Bodega suspendida correctamente."); window.location = "listadoBodega.php";</script>';
        }else{
            echo 3;
        }
    }
?>