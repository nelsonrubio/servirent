<?php
$baseDatos = "pleasemo_sistemaPedagogico";
$user = "pleasemo_servigas";
$password = 'K*HNT~qYE$V{';

    $con = mysqli_connect("localhost", $user, $password, $baseDatos);
    mysqli_set_charset($con, "utf8");
    if(mysqli_connect_errno($con)){
        echo "Fallo al conectar a MYSQL:".mysqli_connect_error();

    }
?>