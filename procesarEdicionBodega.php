<?php
include('conexion/conexion.php');
$idBodega = $_POST['idBodega'];
$nombreBodega = $_POST['bodega'];
$inventario = $_POST['inventario'];
mysqli_query($con, "update bodegas
                          set nombreBodega='$nombreBodega', inventario=$inventario
                          where idBodegas=$idBodega") or
        die("Problemas en el select:" . mysqli_error($con));
        if(mysqli_affected_rows($con)){
            echo "Bodega actualizada correctamente";
        }else{
            echo"No se pudo actualizar la bodega.";
        }
?>