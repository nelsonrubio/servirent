<?php
include('conexion/conexion.php');
$idConstructora = $_POST['id'];
$nombreConstructora = $_POST['nombreConstructora'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$responsable = $_POST['responsable'];
$correo = $_POST['correo'];

mysqli_query($con, "update constructora
                          set nombreConstructora='$nombreConstructora', direccion='$direccion',
                          telefono = '$telefono', responsable = '$responsable' , correo = '$correo'
                        where idConstructoras=$idConstructora") or
        die("Problemas en el select:" . mysqli_error($con));
        if(mysqli_affected_rows($con)){
            echo '<script> alert("Registro completado, por favor acepte para continuar..."); window.location = "listadoConstructora.php";</script>';
        }else{
            echo '<script> alert("Registro no completado, por favor acepte para continuar..."); window.location = "listadoConstructora.php";</script>';
        }
?>