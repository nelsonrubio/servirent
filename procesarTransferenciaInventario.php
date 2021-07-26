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

        $existeDetalleBodega = mysqli_query($con, "select * from articulos where idBodega = $bodegaSecundaria") or
                    die("Problemas en el select:" . mysqli_error($con));
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
                     
                    $articuloBodega = mysqli_query($con, "select * from articulos where idArticulo = $articulo") or
                    die("Problemas en el select:" . mysqli_error($con));
                    $art = mysqli_fetch_array($articuloBodega);

                    $total = $art['cantidad'] + $cantidad;

                    mysqli_query($con, "update detallebodega set cantidad= $total where idBodega = $bodegaSecundaria and idArticulo = $articulo") or
                    die("Problemas en el selectaaaaaaaaaaaaaa:" . mysqli_error($con));

                  
                    echo '<script> alert("Registro completado, por favor acepte para continuar..."); window.location = "crearBodega.php";</script>';
                    //database insert query goes here
                }
            }
        }

 
?>