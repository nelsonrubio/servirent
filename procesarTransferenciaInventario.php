<?php
session_start();
include('conexion/conexion.php');
        $bodegaPrincipal = $_POST['principal'];
        $bodegaSecundaria = $_POST['secundaria'];
        $user=$_SESSION['nombreUsuario'];

        $fechaCreacion = date('Y-m-d');
        $fechaInventario = null;
        $nameArr = $_POST['cantidad'];
        $emailArr = $_POST['herramienta'];
 
        $totalCilindro = 0;
    echo "select * from articulos where idBodega = $bodegaSecundaria";
        $existeDetalleBodega = mysqli_query($con, "select * from articulos where idBodega = $bodegaSecundaria") or
                    die("Problemas en el selectE:" . mysqli_error($con));
                    $existe = mysqli_fetch_array($existeDetalleBodega);
        
        if(count($existe) > 0){
            echo "Si hay existencia";
            $total = 0;
            for($i = 0; $i < count($nameArr); $i++)
            {
                if(!empty($nameArr[$i]))
                {
                    $cantidad = $nameArr[$i];
                    $articulo = $emailArr[$i];
                     
                    $articuloBodega = mysqli_query($con, "select * from articulos where idArticulo = $articulo and idBodega = $bodegaPrincipal") or
                    die("Problemas en el selectA:" . mysqli_error($con));
                    $art = mysqli_fetch_array($articuloBodega);

                    $articuloBodegaPrincipal = mysqli_query($con, "select * from articulos where idArticulo = $articulo and idBodega = $bodegaPrincipal") or
                    die("Problemas en el selectP:" . mysqli_error($con));
                    $artPrin = mysqli_fetch_array($articuloBodegaPrincipal);

                    $total = $art['cantidad'] + $cantidad;
                    $total2 = $artPrin['cantidad'] - $cantidad;

                    mysqli_query($con, "update articulos set cantidad= $total where idBodega = $bodegaSecundaria and idArticulo = $articulo") or
                    die("Problemas en el selectsecundaaria:" . mysqli_error($con));

                    mysqli_query($con, "update articulos set cantidad= $total2 where idBodega = $bodegaPrincipal and idArticulo = $articulo") or
                    die("Problemas en el selectPrincipal:" . mysqli_error($con));

                  
                    echo '<script> alert("Transferencia  completada, por favor acepte para continuar..."); window.location = "transferirInvetario.php";</script>';
                    //database insert query goes here
                }
            }
        }

 
?>