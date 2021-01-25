<?php
include('conexion/conexion.php');

//echo "insert into cilindros(tipoCilindro,precio,descripcionCilindro) values ('$_REQUEST[tipoCilindro]',$_REQUEST[precio], '$_REQUEST[decripcion]')";

 mysqli_query($con, "insert into cilindros(tipoCilindro,precio,descripcionCilindro) values ('$_REQUEST[tipoCilindro]',$_REQUEST[precio], '$_REQUEST[decripcion]')") or
    die("Problemas en el select" . mysqli_error($con));
    if(mysqli_affected_rows($con)){
      echo 2;
  }else{
      echo 4;
  }
?>