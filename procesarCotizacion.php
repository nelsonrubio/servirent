<?php
include('conexion/conexion.php');

    //variables recibidas del formulario
    $nombre = $_POST['nombre'];
    $rut = $_POST['rut'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $obra = $_POST['obras'];
    $constructora = $_POST['constructora'];
    $responsable = null;
    $fechaInicio = null;
    $fechaFin = null;
    $articuloArr = $_POST['articulo'];
    $alquilerArr = $_POST['alquiler'];
    $cantidadArr = $_POST['cantidad'];
    $email = $_POST['email'];
    $chofer = $_POST['chofer'];
    $tipoOperacion = $_POST['operacion'];

    // se inserta la cabecera de la nota de pedido

    //echo "insert into cabeceranota(nombreAlquilino,rut,direccion,telefono,fechaInicio,fechaFin,nombreObra,responsableObra) values ('$nombre','$rut','$direccion','$telefono','$fechaInicio','$fechaFin','$obra','$responsable')";

    mysqli_query($con, "insert into cabeceranota(nombreAlquilino,rut,direccion,telefono,fechaInicio,fechaFin,nombreObra,responsableObra,estatusNota,email,idChofer,idConstructora,tipoOperacion) 
    values ('$nombre','$rut','$direccion','$telefono','$fechaInicio','$fechaFin',$obra,'$responsable',1, '$email', $chofer, $constructora, $tipoOperacion)") or 
    die("Problemas en el select" . mysqli_error($con));
    $idnota = mysqli_insert_id($con);


    if(!empty($articuloArr)){
        for($i = 0; $i < count($articuloArr); $i++){
            if(!empty($articuloArr[$i])){
                $articulo = $articuloArr[$i];
                $alquiler = $alquilerArr[$i];
                $cantidad = $cantidadArr[$i];

               // echo "insert into detallenota(idcabeceranota,modeloarticulo,alquiler,cantidad,statusherramienta)  values ('$idnota','$articulo','$alquiler',$cantidad,1)";
                
                mysqli_query($con, "insert into detallenota(idcabeceranota,modeloarticulo,alquiler,cantidad,statusherramienta) 
                values ('$idnota','$articulo','$alquiler','$cantidad',1)") or 
                die("Problemas en el select" . mysqli_error($con));

                if($tipoOperacion == 1){
                    $registros = mysqli_query($con, "select * from articulos where idArticulo = $articulo ") or
                    die("Problemas en el select:" . mysqli_error($con));
                    $reg = mysqli_fetch_array($registros);
                    $total = $reg['cantidad'] - $cantidad;
                    
                    mysqli_query($con, "update articulos set cantidad = $total where idArticulo=$articulo") or
                    die("Problemas en el select:" . mysqli_error($con));
                }
               

                echo '<script> alert("Registro completado, por favor acepte para continuar..."); window.location = "crearCotizacion.php";</script>';
                
                // Database insert query goes here
            }
        }
    }
?>