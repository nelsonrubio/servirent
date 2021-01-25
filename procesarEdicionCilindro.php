<?php
include('conexion/conexion.php');
$idCilindro = $_POST['id'];
$cilindro = $_POST['tipoCilindro'];
$precio = $_POST['precio'];
$descripcionCilindro = $_POST['prueba'];

//echo "update cilindros set tipoCilindro='$cilindro', precio=$precio, descripcionCilindro = '$descripcionCilindro' where idCilindro=$idCilindro";

mysqli_query($con, "update cilindros
                          set tipoCilindro='$cilindro', precio=$precio, descripcionCilindro = '$descripcionCilindro'
                          where idCilindro=$idCilindro") or
        die("Problemas en el select:" . mysqli_error($con));
        if(mysqli_affected_rows($con)){
            echo 2;
        }else{
            echo 3;
        }
?>