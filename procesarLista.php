<?php
include('conexion/conexion.php');

 mysqli_query($con, "insert into listadoprecio(nombreListado,precio) 
                           values ('$_REQUEST[nombre]',$_REQUEST[precio])") or
    die("Problemas en el select" . mysqli_error($con));
    if(mysqli_affected_rows($con)){
        echo '<script> alert("Registro completado, por favor acepte para continuar..."); window.location = "crearListado.php";</script>';
  }else{
      echo"No se puedo crear el usuario.";
  }
?>