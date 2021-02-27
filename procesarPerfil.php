<?php
include('conexion/conexion.php');
session_start();
$idUser = $_SESSION['idUsuario'];
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$clave = $_POST['password'];

mysqli_query($con, "update usuarios
                    set nombreUsuario='$usuario', email='$email',
                    clave = '$clave' 
                    where idUsuario=$idUser") or
        die("Problemas en el select:" . mysqli_error($con));
        if(mysqli_affected_rows($con)){
            echo 2;
        }else{
            echo 3;
        }
?>