<?php
    include('conexion/conexion.php');

    $descripcion = $_POST['descripcion'];
    $estatus = $_POST['estatus'];
    $idDevolucion = $_POST['devolucion'];

    echo "update devolucion set notaTecnico='$descripcion', statusDevolucion=$estatus where idDevolucion=$id";
    mysqli_query($con, "update devolucion set notaTecnico='$descripcion', statusDevolucion=$estatus where idDevolucion=$idDevolucion") or
        die("Problemas en el select:" . mysqli_error($con));

    echo '<script> alert("Actualizacion realizada, por favor acepte para continuar..."); window.location = "listadoDevolucionesTecnico.php";</script>';

    
?>