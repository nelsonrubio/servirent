<?php
include('conexion/conexion.php');
$idBodega = $_POST['bodega'];
$idChofer = $_POST['chofer'];
mysqli_query($con, "update usuarios
                          set idBodega=$idBodega 
                          where idUsuario=$idChofer") or
        die("Problemas en el select:" . mysqli_error($con));
        if(mysqli_affected_rows($con)){
            echo 2;
        }else{
            echo 3;
        }
?>
