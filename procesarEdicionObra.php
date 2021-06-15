<?php
include('conexion/conexion.php');
$idObra = $_POST['idObra'];
$constructora = $_POST['constructora'];
$nombreObra = $_POST['nombreObra'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$responsable = $_POST['responsable'];
$telefonoResponsable = $_POST['telefonoResponsable'];
$correo = $_POST['correo'];
$fechaInicio = $_POST['fechaInicio'];
$fechaFin = $_POST['fechaFin'];


//echo "update obras set nombreObra='$nombreObra', direccion='$direccion', telefono='$telefono', responsable='$responsable', telefonoResponsable='$telefonoResponsable',correo='$correo', fechaInicio='$fechaInicio', fechaFinalizacion='$fechaFin', idConstructora=$constructora where idObra=$idObra";


mysqli_query($con, "update obras
                          set nombreObra='$nombreObra', direccion='$direccion', telefono='$telefono', responsable='$responsable', telefonoResponsable='$telefonoResponsable',
                          correo='$correo', fechaInicio='$fechaInicio', fechaFinalizacion='$fechaFin', idConstructora=$constructora
                          where idObra=$idObra") or
        die("Problemas en el select:" . mysqli_error($con));
        if(mysqli_affected_rows($con)){
            echo '<script> alert("Edicion completada, por favor acepte para continuar..."); window.location = "listadoObras.php";</script>';
        }else{
            echo"No se pudo actualizar la bodega.";
        }
?>