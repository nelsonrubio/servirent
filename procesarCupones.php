<?php
include('conexion/conexion.php');

echo "insert into cupones(descripcion,porcentaje) values ('$_REQUEST[descripcion]',$_REQUEST[porcentaje])";

 mysqli_query($con, "insert into cupones(descripcion,porcentaje) 
                           values ('$_REQUEST[descripcion]',$_REQUEST[porcentaje])") or
    die("Problemas en el select" . mysqli_error($con));
    if(mysqli_affected_rows($con)){
      echo 2;
  }else{
      echo 4;
  }
?>