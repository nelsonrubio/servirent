<?php
// usuario: pleasemo_servigas
// password: ln@bOHHJM1D&
//Usuario ftp
//
//Clave: sistemaservigas

//base de datos
//$clave= 'yE85kqS*gyjw';
//$usuario = 'pleasemo_servigas2';
//$db = 'pleasemo_servigas';

    $con = mysqli_connect("localhost", "root", "", "servirent");
    mysqli_set_charset($con, "utf8");
    if(mysqli_connect_errno($con)){
        echo "Fallo al conectar a MYSQL:".mysqli_connect_error();

    }
?>