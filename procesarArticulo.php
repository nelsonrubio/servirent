<?php
include('conexion/conexion.php');

echo "insert into articulos(nombreHerramienta,marca,modelo,nroSerie,PrecioDia,PrecioHora,PrecioSemana,PrecioMes,fechaCompra,NroFactura,Proveedor,CodigoEquipo,nota) values ('$_REQUEST[nombre]',$_REQUEST[marca], '$_REQUEST[modelo]',$_REQUEST[serie],$_REQUEST[precioDia],$_REQUEST[precioHora],$_REQUEST[precioSemana],$_REQUEST[precioMes],'$_REQUEST[fechaCompra]',$_REQUEST[nroFactura],$_REQUEST[proveedor],$_REQUEST[codigoEquipo], '$_REQUEST[nota]')";

 mysqli_query($con, "insert into articulos(nombreHerramienta,marca,modelo,nroSerie,PrecioDia,PrecioHora,PrecioSemana,PrecioMes,fechaCompra,NroFactura,Proveedor,CodigoEquipo,nota) values ('$_REQUEST[nombre]','$_REQUEST[marca]', '$_REQUEST[modelo]',$_REQUEST[serie],$_REQUEST[precioDia],$_REQUEST[precioHora],$_REQUEST[precioSemana],$_REQUEST[precioMes],'$_REQUEST[fechaCompra]',$_REQUEST[nroFactura],'$_REQUEST[proveedor]',$_REQUEST[codigoEquipo],'$_REQUEST[nota]')") or
    die("Problemas en el select" . mysqli_error($con));
    if(mysqli_affected_rows($con)){
      echo 2;
  }else{
      echo 4;
  }
?>