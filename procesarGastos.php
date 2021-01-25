<?php
include('conexion/conexion.php');

echo "insert into cajachica(descripcionGastos,fecha,gasto,idChofer) values ('$_REQUEST[descripcion]','$_REQUEST[fecha]',$_REQUEST[gasto], $_REQUEST[chofer])";

mysqli_query($con, "insert into cajachica(descripcionGastos,fecha,gasto,idChofer) 
                          values ('$_REQUEST[descripcion]','$_REQUEST[fecha]',$_REQUEST[gasto], $_REQUEST[chofer])") or
   die("Problemas en el select" . mysqli_error($con));
   if(mysqli_affected_rows($con)){
     echo "Usuario creado  correctamente.";
 }else{
     echo"No se puedo crear el usuario.";
 }

?>