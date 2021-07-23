<?php
include('conexion/conexion.php');
    $cantidad = $_GET['cantidad'];
    $bodega = $_GET['id'];
  
        mysqli_query($con, "update bodegas
                          set hidden = 0 
                          where idBodega=$bodega") or
        die("Problemas en el select:" . mysqli_error($con));
        if(mysqli_affected_rows($con)){
            echo '<script> alert("Bodega activada correctamente."); window.location = "listadoBodega.php";</script>';
        }else{
            echo 3;
        }
  
?>