<?php
include('conexion/conexion.php');

    //variables recibidas del formulario
    $nombre = $_POST['nombre'];
    $rut = $_POST['rut'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $obra = $_POST['obra'];
    $responsable = $_POST['responsable'];
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];
    $articuloArr = $_POST['articulo'];
    $alquilerArr = $_POST['alquiler'];
    $cantidadArr = $_POST['cantidad'];
    $email = $_POST['email'];
    $chofer = $_POST['chofer'];

    // se inserta la cabecera de la nota de pedido

    //echo "insert into cabeceranota(nombreAlquilino,rut,direccion,telefono,fechaInicio,fechaFin,nombreObra,responsableObra) values ('$nombre','$rut','$direccion','$telefono','$fechaInicio','$fechaFin','$obra','$responsable')";

    mysqli_query($con, "insert into cabeceranota(nombreAlquilino,rut,direccion,telefono,fechaInicio,fechaFin,nombreObra,responsableObra,estatusNota,email,idChofer) 
    values ('$nombre','$rut','$direccion','$telefono','$fechaInicio','$fechaFin','$obra','$responsable',1, '$email', $chofer)") or 
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

                echo '<script> alert("Registro completado, por favor acepte para continuar..."); window.location = "crearCotizacion.php";</script>';
                
                // Database insert query goes here
            }
        }
    }
?>