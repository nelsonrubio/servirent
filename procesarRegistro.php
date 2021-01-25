<?php
include('conexion/conexion.php');

 mysqli_query($con, "insert into usuarios(nombreUsuario,clave,tipoUsuario,email) 
                           values ('$_REQUEST[usuario]','$_REQUEST[password]',$_REQUEST[tipo], '$_REQUEST[email]')") or
    die("Problemas en el select" . mysqli_error($con));
    if(mysqli_affected_rows($con)){
      echo "Usuario creado  correctamente.";
  }else{
      echo"No se puedo crear el usuario.";
  }
?>