<?php
session_start();
include('conexion/conexion.php');
        $bodegaPrincipal = $_POST['principal'];
        $bodegaSecundaria = $_POST['secundaria'];
        $user=$_SESSION['nombreUsuario'];

        $fechaCreacion = date('Y-m-d');
        $fechaInventario = null;
        $nameArr = $_POST['name'];
        $emailArr = $_POST['email'];
        $tipoArr = $_POST['tipo'];
        $empresaArr = $_POST['empresa'];
        $totalCilindro = 0;

        $existeDetalleBodega = mysqli_query($con, "select * from detallebodega where idBodega = $bodegaSecundaria") or
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
                    $cilindro = $emailArr[$i];
                    $tipo = $tipoArr[$i];
                    $empresa = $empresaArr[$i];
                    $cilindroDetalle = mysqli_query($con, "select * from cilindros where idCilindro = $cilindro") or
                    die("Problemas en el select:" . mysqli_error($con));
                    $detCilindro = mysqli_fetch_array($cilindroDetalle);

                    $tipoCilindro = mysqli_query($con, "select * from tipoCilindro where idTipo = $tipo") or
                    die("Problemas en el select:" . mysqli_error($con));
                    $typeCilindro = mysqli_fetch_array($tipoCilindro);

                    $empresaCilindro =mysqli_query($con, "select * from empresascilindros where idEmpresa = $empresa") or
                    die("Problemas en el select:" . mysqli_error($con));
                    $Empre = mysqli_fetch_array($empresaCilindro);

                    $nombreCilindro = $detCilindro['tipoCilindro'];
                    $precioCilindro = $detCilindro['precio'];
                    $cilindroType = $typeCilindro['nombreTipo'];
                    $cilindroEmpresa = $Empre['nombreEmpresa'];
                    $total += $cantidad;

                    echo "select * from detallebodega where idBodega = $bodegaPrincipal and pesoCilindro = $nombreCilindro and tipoCilindro = '$cilindroType' and empresaCilindro = '$cilindroEmpresa'";
                    $updateCilindro =mysqli_query($con, "select * from detallebodega where idBodega = $bodegaPrincipal and pesoCilindro = $nombreCilindro and tipoCilindro = '$cilindroType' and empresaCilindro = '$cilindroEmpresa'") or
                    die("Problemas en el selecttttttttttttttttttttttttt:" . mysqli_error($con));
                    $result = mysqli_fetch_array($updateCilindro);

                    $cabeceraTotal = $result['cantidad'] - $total;

                    mysqli_query($con, "update detallebodega set cantidad= $cabeceraTotal where idBodega = $bodegaPrincipal and pesoCilindro = $nombreCilindro and tipoCilindro = '$cilindroType' and empresaCilindro = '$cilindroEmpresa'") or
                    die("Problemas en el selectaaaaaaaaaaaaaa:" . mysqli_error($con));



                    $updateCilindro2 =mysqli_query($con, "select * from detallebodega where idBodega = $bodegaSecundaria and pesoCilindro = $nombreCilindro and tipoCilindro = '$cilindroType' and empresaCilindro = '$cilindroEmpresa'") or
                    die("Problemas en el selecttttttttttttttttttttttttt:" . mysqli_error($con));
                    $result2 = mysqli_fetch_array($updateCilindro2);

                    $cabeceraTotal2 = $result2['cantidad'] + $total;

                    mysqli_query($con, "update detallebodega set cantidad= $cabeceraTotal2 where idBodega = $bodegaSecundaria and pesoCilindro = $nombreCilindro and tipoCilindro = '$cilindroType' and empresaCilindro = '$cilindroEmpresa'") or
                    die("Problemas en el selectaaaaaaaaaaaaaa:" . mysqli_error($con));

                    // echo  "insert into detallebodega(idBodega,empresaCilindro,pesoCilindro,cantidad,tipoCilindro) values ($bodegaSecundaria, '$cilindroEmpresa', $nombreCilindro,$cantidad,'$cilindroType')";

                  
                    echo '<script> alert("Registro completado, por favor acepte para continuar..."); window.location = "crearBodega.php";</script>';
                    //database insert query goes here
                }
            }


            $invetarioSecundario =mysqli_query($con, "select * from bodegas where idBodegas = $bodegaSecundaria") or
            die("Problemas en el select:" . mysqli_error($con));
            $cr72 = mysqli_fetch_array($invetarioSecundario);

            $cr7Principal2 = $cr72['inventario'] + $total;

            mysqli_query($con, "update bodegas set inventario= $cr7Principal2 where idBodegas= $bodegaSecundaria") or
            die("Problemas en el select:" . mysqli_error($con));

            $invetarioPrincipal =mysqli_query($con, "select * from bodegas where idBodegas = $bodegaPrincipal") or
            die("Problemas en el select:" . mysqli_error($con));
            $cr7 = mysqli_fetch_array($invetarioPrincipal);

            $cr7Principal = $cr7['inventario'] - $total;

            mysqli_query($con, "update bodegas set inventario= $cr7Principal where idBodegas= $bodegaPrincipal") or
            die("Problemas en el select:" . mysqli_error($con));
        }
        else{
            $total = 0;
            for($i = 0; $i < count($nameArr); $i++)
            {
                if(!empty($nameArr[$i]))
                {
                    $cantidad = $nameArr[$i];
                    $cilindro = $emailArr[$i];
                    $tipo = $tipoArr[$i];
                    $empresa = $empresaArr[$i];
                    $cilindroDetalle = mysqli_query($con, "select * from cilindros where idCilindro = $cilindro") or
                    die("Problemas en el select:" . mysqli_error($con));
                    $detCilindro = mysqli_fetch_array($cilindroDetalle);

                    $tipoCilindro = mysqli_query($con, "select * from tipoCilindro where idTipo = $tipo") or
                    die("Problemas en el select:" . mysqli_error($con));
                    $typeCilindro = mysqli_fetch_array($tipoCilindro);

                    $empresaCilindro =mysqli_query($con, "select * from empresascilindros where idEmpresa = $empresa") or
                    die("Problemas en el select:" . mysqli_error($con));
                    $Empre = mysqli_fetch_array($empresaCilindro);

                    $nombreCilindro = $detCilindro['tipoCilindro'];
                    $precioCilindro = $detCilindro['precio'];
                    $cilindroType = $typeCilindro['nombreTipo'];
                    $cilindroEmpresa = $Empre['nombreEmpresa'];
                    $total += $cantidad;

                    echo "select * from detallebodega where idBodega = $bodegaPrincipal and pesoCilindro = $nombreCilindro and tipoCilindro = '$cilindroType' and empresaCilindro = '$cilindroEmpresa'";
                    $updateCilindro =mysqli_query($con, "select * from detallebodega where idBodega = $bodegaPrincipal and pesoCilindro = $nombreCilindro and tipoCilindro = '$cilindroType' and empresaCilindro = '$cilindroEmpresa'") or
                    die("Problemas en el selecttttttttttttttttttttttttt:" . mysqli_error($con));
                    $result = mysqli_fetch_array($updateCilindro);

                  

                    $cabeceraTotal = $result['cantidad'] - $total;

                    mysqli_query($con, "update detallebodega set cantidad= $cabeceraTotal where idBodega = $bodegaPrincipal and pesoCilindro = $nombreCilindro and tipoCilindro = '$cilindroType' and empresaCilindro = '$cilindroEmpresa'") or
                    die("Problemas en el selectaaaaaaaaaaaaaa:" . mysqli_error($con));

                    // echo  "insert into detallebodega(idBodega,empresaCilindro,pesoCilindro,cantidad,tipoCilindro) values ($bodegaSecundaria, '$cilindroEmpresa', $nombreCilindro,$cantidad,'$cilindroType')";

                    mysqli_query($con,"insert into detallebodega(idBodega,empresaCilindro,pesoCilindro,cantidad,tipoCilindro) 
                    values ($bodegaSecundaria, '$cilindroEmpresa', $nombreCilindro,$cantidad,'$cilindroType')") or 
                    die("Problemas en el select" . mysqli_error($con));
                    echo '<script> alert("Registro completado, por favor acepte para continuar..."); window.location = "crearBodega.php";</script>';
                    //database insert query goes here
                }
            }
            mysqli_query($con, "update bodegas set inventario= $total where idBodegas= $bodegaSecundaria") or
            die("Problemas en el select:" . mysqli_error($con));

            $invetarioPrincipal =mysqli_query($con, "select * from bodegas where idBodegas = $bodegaPrincipal") or
            die("Problemas en el select:" . mysqli_error($con));
            $cr7 = mysqli_fetch_array($invetarioPrincipal);

            $cr7Principal = $cr7['inventario'] - $total;

            mysqli_query($con, "update bodegas set inventario= $cr7Principal where idBodegas= $bodegaPrincipal") or
            die("Problemas en el select:" . mysqli_error($con));

        }
            
            //echo $idCabeceraPedido;
 /*           for($i = 0; $i < count($nameArr); $i++)
            {
                if(!empty($nameArr[$i]))
                {
                    $cantidad = $nameArr[$i];
                    $cilindro = $emailArr[$i];
                    $tipo = $tipoArr[$i];
                    $empresa = $empresaArr[$i];
                    $cilindroDetalle = mysqli_query($con, "select * from cilindros where idCilindro = $cilindro") or
                    die("Problemas en el select:" . mysqli_error($con));
                    $detCilindro = mysqli_fetch_array($cilindroDetalle);

                    $tipoCilindro = mysqli_query($con, "select * from tipoCilindro where idTipo = $tipo") or
                    die("Problemas en el select:" . mysqli_error($con));
                    $typeCilindro = mysqli_fetch_array($tipoCilindro);

                    $empresaCilindro =mysqli_query($con, "select * from empresascilindros where idEmpresa = $empresa") or
                    die("Problemas en el select:" . mysqli_error($con));
                    $Empre = mysqli_fetch_array($empresaCilindro);

                    $nombreCilindro = $detCilindro['tipoCilindro'];
                    $precioCilindro = $detCilindro['precio'];
                    $cilindroType = $typeCilindro['nombreTipo'];
                    $cilindroEmpresa = $Empre['nombreEmpresa'];

                    // echo  "insert into detallebodega(idBodega,empresaCilindro,pesoCilindro,cantidad,tipoCilindro) 
                    //values ($idCabeceraPedido, '$cilindroEmpresa', $nombreCilindro,$cantidad,'$cilindroType')";

        mysqli_query($con,"insert into detallebodega(idBodega,empresaCilindro,pesoCilindro,cantidad,tipoCilindro) 
                    values ($idCabeceraPedido, '$cilindroEmpresa', $nombreCilindro,$cantidad,'$cilindroType')") or 
                    die("Problemas en el select" . mysqli_error($con));
                    echo '<script> alert("Registro completado, por favor acepte para continuar..."); window.location = "crearBodega.php";</script>';
                    //database insert query goes here
                }
            }*/




  
?>