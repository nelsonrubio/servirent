<?php
session_start();
include('conexion/conexion.php');
if($_POST['tipoBodega'] == 1){
        $user=$_SESSION['nombreUsuario'];
        $nombre = $_POST['bodega'];
        $fechaCreacion = date('Y-m-d');
        $fechaInventario = null;
        $nameArr = $_POST['name'];
        $emailArr = $_POST['email'];
        $tipoArr = $_POST['tipo'];
        $empresaArr = $_POST['empresa'];
        $totalCilindro = 0;
            
        if(!empty($nameArr)){
        for($i = 0; $i < count($nameArr); $i++)
        {
            if(!empty($nameArr[$i]))
            {
                $name = $nameArr[$i];
                $email = $emailArr[$i];
                $tipo = $tipoArr[$i];
                $totalCilindro += $name; 
            }
        }
        $fechaActual = date('d-m-Y');
        $inicioFecha = strtotime($fechaActual);
        $newFecha = date('Y-m-d', $inicioFecha);
        echo "insert into bodegas(nombreBodega,inventario,fechaCreacion,fechaMovimiento,usuario) 
                                values ('$nombre',$totalCilindro,'$newFecha', '$fechaInventario', '$user')";
        mysqli_query($con, "insert into bodegas(nombreBodega,inventario,fechaCreacion,fechaMovimiento,usuario,tipoBodega) 
                                values ('$nombre',$totalCilindro,'$newFecha', '$fechaInventario', '$user',1)") or 
        die("Problemas en el select" . mysqli_error($con));
        if(mysqli_affected_rows($con)){
            $idCabeceraPedido = mysqli_insert_id($con);
            //echo $idCabeceraPedido;
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

                    // echo  "insert into detallebodega(idBodega,empresaCilindro,pesoCilindro,cantidad,tipoCilindro) 
                    //values ($idCabeceraPedido, '$cilindroEmpresa', $nombreCilindro,$cantidad,'$cilindroType')";

        mysqli_query($con,"insert into detallebodega(idBodega,empresaCilindro,pesoCilindro,cantidad,tipoCilindro) 
                    values ($idCabeceraPedido, '$cilindroEmpresa', $nombreCilindro,$cantidad,'$cilindroType')") or 
                    die("Problemas en el select" . mysqli_error($con));
                    echo '<script> alert("Registro completado, por favor acepte para continuar..."); window.location = "crearBodega.php";</script>';
                    //database insert query goes here
                }
            }
        
        }else{
            echo"No se puedo crear el usuario.";
        }
        }

}
else{
    $user=$_SESSION['nombreUsuario'];
    $nombre = $_POST['bodega'];
    $fechaCreacion = date('Y-m-d');
    $fechaInventario = null;
    $totalCilindro = 0;
        
    $fechaActual = date('d-m-Y');
    $inicioFecha = strtotime($fechaActual);
    $newFecha = date('Y-m-d', $inicioFecha);
    mysqli_query($con, "insert into bodegas(nombreBodega,inventario,fechaCreacion,fechaMovimiento,usuario,tipoBodega) 
                            values ('$nombre',$totalCilindro,'$newFecha', '$fechaInventario', '$user',2)") or 
    die("Problemas en el select" . mysqli_error($con));
    echo '<script> alert("Registro completado, por favor acepte para continuar..."); window.location = "crearBodega.php";</script>';
}

  
?>