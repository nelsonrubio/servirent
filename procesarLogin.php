<?php
include('conexion/conexion.php');
$email = $_POST['email'];
$password = $_POST['password'];
$registros = mysqli_query($con, "select * from usuarios where email='$email' and clave='$password'") or
die("Problemas en el select:" . mysqli_error($con));

if ($reg = mysqli_fetch_array($registros)) {
     session_start();
   if($reg['tipoUsuario'] == 1){
        $_SESSION['idUsuario'] = $reg['idUsuario'];
        $_SESSION['nombreUsuario'] = $reg['nombreUsuario'];
        $_SESSION['tipoUsuario'] = $reg['tipoUsuario'];
        $_SESSION['email'] = $reg['email'];
        echo true;
   }
   if($reg['tipoUsuario'] == 2){
        $_SESSION['idUsuario'] = $reg['idUsuario'];
        $_SESSION['nombreUsuario'] = $reg['nombreUsuario'];
        $_SESSION['tipoUsuario'] = $reg['tipoUsuario'];
        $_SESSION['email'] = $reg['email'];
       echo true;
   }
   if($reg['tipoUsuario'] == 3){
        $_SESSION['idUsuario'] = $reg['idUsuario'];
        $_SESSION['nombreUsuario'] = $reg['nombreUsuario'];
        $_SESSION['tipoUsuario'] = $reg['tipoUsuario'];
        $_SESSION['email'] = $reg['email'];
        echo true;
   }
  } 
else {
    echo false;
  }
?>