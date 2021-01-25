<?php
include('conexion/conexion.php');
$idUser = $_POST['usuario'];
$user = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$tipo = $_POST['tipo'];
mysqli_query($con, "update usuarios
                          set nombreUsuario='$user', email='$email',
                          clave = '$password', tipoUsuario = $tipo 
                        where idUsuario=$idUser") or
        die("Problemas en el select:" . mysqli_error($con));
        if(mysqli_affected_rows($con)){
            echo "Usuario actualizado correctamente";
        }else{
            echo"No se puedo eliminar el usuario.";
        }
?>