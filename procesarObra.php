<?php
session_start();
include('conexion/conexion.php');
        $nombreObra = $_POST['nombreObra'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $responsable = $_POST['responsable'];
        $telefonoResponsable = $_POST['telefonoResponsable'];
        $correo = $_POST['correo'];
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];
        $constructora = $_POST['constructora'];

        echo "insert into obras(nombreObra,direccion,telefono,responsable,telefonoResponsable, correo, fechaInicio, FechaFinalizacion) values ('$nombreObra','$direccion', '$telefono', '$responsable', '$telefonoResponsable', '$correo', '$fechaInicio', '$fechaFin')";
        mysqli_query($con, "insert into obras(nombreObra,direccion,telefono,responsable,telefonoResponsable, correo, fechaInicio, FechaFinalizacion, idConstructora) 
                                values ('$nombreObra','$direccion', '$telefono', '$responsable', '$telefonoResponsable', '$correo', '$fechaInicio', '$fechaFin', $constructora)") or 
        die("Problemas en el select" . mysqli_error($con));
        echo '<script> alert("Registro completado, por favor acepte para continuar..."); window.location = "crearObra.php";</script>';

  
?>