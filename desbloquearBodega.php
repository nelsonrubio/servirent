<?php
include('conexion/conexion.php');
session_start();
$user=$_SESSION['nombreUsuario'];
    $cantidad = $_GET['cantidad'];
    $bodega = $_GET['id'];
    $fechaActual = date('d-m-Y');
    $inicioFecha = strtotime($fechaActual);
    $newFecha = date('Y-m-d', $inicioFecha);
  
        mysqli_query($con, "update bodegas
                          set hidden = 0 ,user ='$user', fecha='$newFecha'
                          where idBodega=$bodega") or
        die("Problemas en el select:" . mysqli_error($con));
        if(mysqli_affected_rows($con)){
            echo '<script> alert("Bodega activada correctamente."); window.location = "listadoBodega.php";</script>';
        }else{
            echo 3;
        }
  
?>