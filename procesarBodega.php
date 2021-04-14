<?php
session_start();
include('conexion/conexion.php');
        $nombreBodega = $_POST['bodega'];
        $tipoBodega = $_POST['tipoBodega'];
        $fechaActual = date('d-m-Y');
        $inicioFecha = strtotime($fechaActual);
        $newFecha = date('Y-m-d', $inicioFecha);
        
        echo "insert into bodegas(nombreBodega,fechaCreacion,tipoBodega) 
                                values ('$nombreBodega','$newFecha',$tipoBodega)";
        mysqli_query($con, "insert into bodegas(nombreBodega,fechaCreacion,tipoBodega) 
                                values ('$nombreBodega','$newFecha',$tipoBodega)") or 
        die("Problemas en el select" . mysqli_error($con));
        echo '<script> alert("Registro completado, por favor acepte para continuar..."); window.location = "crearBodega.php";</script>';

  
?>