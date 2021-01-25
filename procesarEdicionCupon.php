<?php
include('conexion/conexion.php');
$idCupon = $_POST['id'];
$descripcion = $_POST['descripcion'];
$porcentaje = $_POST['porcentaje'];
mysqli_query($con, "update cupones
                          set descripcion='$descripcion', porcentaje=$porcentaje
                          where idCupon=$idCupon") or
        die("Problemas en el select:" . mysqli_error($con));
        if(mysqli_affected_rows($con)){
            echo 2;
        }else{
            echo 3;
        }
?>