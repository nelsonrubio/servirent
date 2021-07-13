<?php
    include('conexion/conexion.php');
    session_start();
    $user=$_SESSION['idUsuario'];
    $descripcion = $_POST['descripcion'];
    $estatus = $_POST['estatus'];
    $idDevolucion = $_POST['maldito'];
 


    mysqli_query($con, "update devolucion set notaTecnico='$descripcion', statusDevolucion=$estatus , iduser=$user where idDevolucion=$idDevolucion") or
        die("Problemas en el select:" . mysqli_error($con));

    echo '<script> alert("Actualizacion realizada, por favor acepte para continuar..."); window.location = "listadoDevolucionesTecnico.php";</script>';

    
?>