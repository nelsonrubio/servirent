<?php
include('conexion/conexion.php');
$idNota = $_POST['id'];
$cabecera = mysqli_query($con, "select * from cabeceranota where idcabeceranota = $idNota ") or
die("Problemas en el select:" . mysqli_error($con));


if($result = mysqli_fetch_assoc($cabecera)){
    $array []= $result; 
     
    $data['status'] = 'ok';
    $data['result'] = $array;
    echo json_encode($data);
}
else{
    $data['status'] = 'null';
    $data['mensaje'] = 'No existe niguna nota asociado al numero ingresado';
}





?>