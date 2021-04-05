<?php
include('conexion/conexion.php');
$d1 = $_POST['d1'];
$d2 = $_POST['d2'];
$d3 = $_POST['d3'];
$d4 = $_POST['d4'];
$d5 = $_POST['d5'];
$d6 = $_POST['d6'];
$d7 = $_POST['d7'];
$d8 = $_POST['d8'];
$d9 = $_POST['d9'];
$d10 = $_POST['d10'];
$d11 = $_POST['d11'];
$d12 = $_POST['d12'];
$d13 = $_POST['d13'];

//echo "insert into articulos(nombreHerramienta,marca,modelo,nroSerie,PrecioDia,PrecioHora,PrecioSemana,PrecioMes,fechaCompra,NroFactura,Proveedor,CodigoEquipo,nota) values ('$d1','$d2', '$d3',$d4,$d5,$d6,$d7,$d8,'$d9',$d10,'$d11','$d12','$d13')";
mysqli_query($con, "insert into articulos(nombreHerramienta,marca,modelo,nroSerie,PrecioDia,PrecioHora,PrecioSemana,PrecioMes,fechaCompra,NroFactura,Proveedor,CodigoEquipo,nota) values ('$d1','$d2', '$d3',$d4,$d5,$d6,$d7,$d8,'$d9',$d10,'$d11','$d12','$d13')") or
die("Problemas en el select" . mysqli_error($con));
if(mysqli_affected_rows($con)){
  echo 2;
}else{
  echo 4;
}



?>