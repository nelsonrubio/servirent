<?php
include('conexion/conexion.php');
$idArticulo = $_POST['id'];
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$serie = $_POST['serie'];
$precioDia = $_POST['precioDia'];
$precioHora = $_POST['precioHora'];
$precioSemana = $_POST['precioSemana'];
$precioMes = $_POST['precioMes'];
$fechaCompra = $_POST['fechaCompra'];
$nroFactura = $_POST['nroFactura'];
$proveedor = $_POST['proveedor'];
$codigoEquipo = $_POST['codigoEquipo'];
$nota = $_POST['nota'];

//echo "update articulos set nombreHerramienta='$nombre', marca='$marca', modelo='$modelo', nroSerie=$serie, PrecioDia=$precioDia, PrecioHora=$precioHora, PrecioSemana=$precioSemana, PrecioMes=$precioMes, fechaCompra=$fechaCompra, NroFactura=$nroFactura,Proveedor='$proveedor', CodigoEquipo='$codigoEquipo', nota='$nota' where idArticulo=$idArticulo";


mysqli_query($con, "update articulos
                          set nombreHerramienta='$nombre', marca='$marca', modelo='$modelo', nroSerie=$serie, PrecioDia=$precioDia,
                          PrecioHora=$precioHora, PrecioSemana=$precioSemana, PrecioMes=$precioMes, fechaCompra=$fechaCompra,
                          NroFactura=$nroFactura,Proveedor='$proveedor', CodigoEquipo='$codigoEquipo', nota='$nota'
                          where idArticulo=$idArticulo") or
        die("Problemas en el select:" . mysqli_error($con));
        if(mysqli_affected_rows($con)){
            echo "Bodega actualizada correctamente";
        }else{
            echo"No se pudo actualizar la bodega.";
        }
?>