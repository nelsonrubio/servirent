<?php
session_start();
include('conexion/conexion.php');
        $nombreObra = $_POST['nombreObra'];

        //echo "insert into obras(nombreObra) values ('$nombreObra')";
        mysqli_query($con, "insert into obras(nombreObra) 
                                values ('$nombreObra')") or 
        die("Problemas en el select" . mysqli_error($con));
        echo '<script> alert("Registro completado, por favor acepte para continuar..."); window.location = "crearObra.php";</script>';

  
?>