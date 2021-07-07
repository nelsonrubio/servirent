<?php
include('conexion/conexion.php');
$idNota = $_POST['id'];
$arreglo = $_POST['array'];
$articulo = null;
$descripcion = $_POST['descripcion'];
$cabecera = mysqli_query($con, "select * from detallenota where idcabeceranota = $idNota ") or
die("Problemas en el select:" . mysqli_error($con));

while($result = mysqli_fetch_array($cabecera)){
    for($i= 0; $i < count($arreglo); $i++){
        $idArticulo = $arreglo[$i];
        $articulo = $idArticulo;
        mysqli_query($con, "update detallenota set devolucion= 1 where idcabeceranota= $idNota and modeloarticulo = $idArticulo") or
        die("Problemas en el selectzzzzzzzzzz:" . mysqli_error($con));
    }
    
}
$fechaActual = date('Y-m-d');
mysqli_query($con, "insert into devolucion(idcabeceranota,idarticulo,nota,fechaDevolucion) 
values ($idNota, $articulo, '$descripcion', '$fechaActual')") or 
die("Problemas en el select" . mysqli_error($con));
$data['status'] = 'ok';
echo json_encode($data);

?>