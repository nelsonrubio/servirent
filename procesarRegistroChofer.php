<?php
include('conexion/conexion.php');
$nombreChofer = $_POST['nombreChofer'];
$rut = $_POST['rut'];
$nombreUsuario = $_POST['usuario'];
$password = $_POST['password'];
$idBodega = $_POST['tipo'];
$email = $_POST['email'];
$tipoUsuario = 3;

mysqli_query($con, "insert into chofer(nombreChofer,rut,nombreUsuario,password,idBodega,email, tipoUsuario) 
                          values ('$nombreChofer','$rut','$nombreUsuario', '$password', $idBodega, '$email', $tipoUsuario)") or
   die("Problemas en el select" . mysqli_error($con));
   if(mysqli_affected_rows($con)){
     echo 3;
 }else{
     echo 4;
 }
?>