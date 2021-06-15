<?php
include('conexion/conexion.php');
    $html = '';
    $idConstructora = $_POST['id_category'];
    $registros = mysqli_query($con, "select * from obras where idConstructora = $idConstructora ") or
    die("Problemas en el select:" . mysqli_error($con));

    while($reg = mysqli_fetch_array($registros) ){
        $html .= '<option value="'.$reg['idObra'].'">'.$reg['nombreObra'].'</option>';
    }
    echo $html;
?>