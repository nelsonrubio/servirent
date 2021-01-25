<?php
session_start();
include('conexion/conexion.php');
 
        $nameArr = $_POST['name'];
        $emailArr = $_POST['email'];
        $idPedido = $_POST['id'];
        $status = $_POST['estatus'];

            
        if(!empty($nameArr)){
            for($i = 0; $i < count($nameArr); $i++)
            {
                if(!empty($nameArr[$i]))
                {
                    $name = $nameArr[$i];
                    $email = $emailArr[$i];

                    $tipo = mysqli_query($con, "select * from metodospago where idPago = $email") or
                    die("Problemas en el select:" . mysqli_error($con));
                    $pago = mysqli_fetch_array($tipo);
                    $tipoPago = $pago['nombrePago'];
                    $fechaActual = date('d-m-Y');
                    $inicioFecha = strtotime($fechaActual);
                    $newFecha = date('Y-m-d', $inicioFecha);
                    mysqli_query($con, "insert into pagopedido(idPedido,monto,metodo,fechaPago) 
                                            values ('$idPedido',$name,'$tipoPago', '$newFecha')") or 
                    die("Problemas en el select" . mysqli_error($con));
                    
                 
                }
            }
        
        }

        if($status == 6){
            $pedidos = mysqli_query($con, "select * from pedidos where idPedido = $idPedido ") or
            die("Problemas en el select:" . mysqli_error($con));
            $reg = mysqli_fetch_array($pedidos);
            $idBodega = $reg['idBodegas'];

            $bodegaInventario = mysqli_query($con, "select * from bodegas where idBodegas = $idBodega ") or
            die("Problemas en el select:" . mysqli_error($con));
            $regInvetario = mysqli_fetch_array($bodegaInventario);

            $TotalPedido = $regInvetario['inventario'] - $reg['TotalCilindro'];



            $pedidos = mysqli_query($con, "select * from detallepedido where idPedido = $idPedido ") or
            die("Problemas en el select:" . mysqli_error($con));

            while($infoUpdate = mysqli_fetch_array($pedidos)){
                $idCilindro = $infoUpdate['cilindro'];
                $tipoCilindro = $infoUpdate['tipoCilindro'];
                $empresaCilindro = $infoUpdate['empresaCilindro'];

                $update = mysqli_query($con, "select * from detallebodega where idBodega = $idBodega and  pesoCilindro = $idCilindro") or
                die("Problemas en el select:" . mysqli_error($con));
                $reg20 = mysqli_fetch_array($update);

                
                    $descontarIventario =  $reg20['cantidad'] - $infoUpdate['cantidad'] ;

                    mysqli_query($con, "update detallebodega set cantidad= $descontarIventario where idBodega= $idBodega and pesoCilindro = $idCilindro and tipoCilindro = '$tipoCilindro' and empresaCilindro = '$empresaCilindro'") or
                    die("Problemas en el select:" . mysqli_error($con));
               
            }
            mysqli_query($con, "update bodegas set inventario=$TotalPedido where idBodegas=$idBodega") or
            die("Problemas en el select:" . mysqli_error($con)); 
            mysqli_query($con, "update pedidos set  estatusPedido=$status where idPedido=$idPedido") or
            die("Problemas en el select:" . mysqli_error($con));
            echo '<script> alert("Registro completado, por favor acepte para continuar..."); window.location = "listadoVentasChofer.php";</script>';
                 
        }

 


  
?>