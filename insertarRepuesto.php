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
 

//Se valida si el codigo interno del equipo existe
$inventario = mysqli_query($con, "select * from repuesto where CodInterno = '$d3'") or 
die("Problemas en el select: " . mysqli_error($con));

if(mysqli_num_rows($inventario)> 0){
  $reg = mysqli_fetch_array($inventario);
  $total = $reg['cantidad'] + $d4;
  mysqli_query($con, "update repuesto set cantidad= $total where CodInterno = '$d3'") or
  die("Problemas en el select:" . mysqli_error($con));


}
else{
   
  mysqli_query($con, "insert into repuesto(idBodega,codOrigen,CodInterno,cantidad, proveedor,nroFactura,stock,precio,precioVenta, nombreRepuesto) values ($d1,'$d2', '$d3', $d4, '$d5','$d6',$d7,$d8,$d9,'$d10')") or
  die("Problemas en el select" . mysqli_error($con));
  if(mysqli_affected_rows($con)){
    echo 2;
  }else{
    echo 4;
  }
}
//cambios a insertar
//echo "insert into articulos(nombreHerramienta,marca,modelo,nroSerie,PrecioDia,PrecioHora,PrecioSemana,PrecioMes,fechaCompra,NroFactura,Proveedor,CodigoEquipo,nota) values ('$d1','$d2', '$d3',$d4,$d5,$d6,$d7,$d8,'$d9',$d10,'$d11','$d12','$d13')";




?>