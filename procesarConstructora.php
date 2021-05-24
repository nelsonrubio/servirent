<?php
session_start();
include('conexion/conexion.php');
        $nombreConstructora = $_POST['nombreConstructora'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $responsable = $_POST['responsable'];
        $correo = $_POST['correo'];

        //echo "insert into constructora(nombreConstructora,direccion,telefono,responsable, correo) values ('$nombreConstructora','$direccion', '$telefono', '$responsable', '$correo')";
        mysqli_query($con, "insert into constructora(nombreConstructora,direccion,telefono,responsable, correo) 
                                values ('$nombreConstructora','$direccion', '$telefono', '$responsable', '$correo')") or 
        die("Problemas en el select" . mysqli_error($con));
        echo '<script> alert("Registro completado, por favor acepte para continuar..."); window.location = "crearConstructora.php";</script>';

  
?>