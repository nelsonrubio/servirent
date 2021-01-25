<?php
session_start();
include('conexion/conexion.php');
$user=$_SESSION['nombreUsuario'];
$idBodega = $_POST['bodega'];
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
          $cantidad = $nameArr[$i];
          $cilindro = $emailArr[$i];
          $tipo = $tipoArr[$i];
          $empresa = $empresaArr[$i];
          //echo $cantidad." - ".$cilindro." - ".$tipo." - ".$empresa." - ".$idBodega;

          $empresaCilindro =mysqli_query($con, "select * from empresascilindros where idEmpresa = $empresa") or
          die("Problemas en el select:" . mysqli_error($con));
          $Empre = mysqli_fetch_array($empresaCilindro);
          $nombreEmpresa = $Empre['nombreEmpresa'];

          $tipoCilindro =mysqli_query($con, "select * from tipocilindro where idTipo = $tipo") or
          die("Problemas en el select:" . mysqli_error($con));
          $marca = mysqli_fetch_array($tipoCilindro);
          $marcaCilindro = $marca['nombreTipo'];

          $cilindroDetalle = mysqli_query($con, "select * from detallebodega where idBodega = $idBodega and pesoCilindro = $cilindro and empresaCilindro = '$nombreEmpresa' and tipoCilindro = '$marcaCilindro'") or
          die("Problemas en el select:" . mysqli_error($con));
          $detCilindro = mysqli_fetch_array($cilindroDetalle);

          $bodega = mysqli_query($con, "select * from bodegas where idBodegas = $idBodega") or
          die("Problemas en el select:" . mysqli_error($con));
          $bodegaCabecra = mysqli_fetch_array($bodega);
          $newtotalCabecera = $bodegaCabecra['inventario'] + $cantidad;

          mysqli_query($con, "update bodegas set inventario= $newtotalCabecera where idBodegas = $idBodega") or
          die("Problemas en el select:" . mysqli_error($con));

          if(count($detCilindro) > 0){
            $newInventario = $detCilindro['cantidad'] + $cantidad;
            mysqli_query($con, "update detallebodega set cantidad= $newInventario where idBodega = $idBodega and pesoCilindro = $cilindro and empresaCilindro = '$nombreEmpresa' and tipoCilindro = '$marcaCilindro'") or
           die("Problemas en el select:" . mysqli_error($con));
           echo '<script> alert("Registro completado, por favor acepte para continuar..."); window.location = "listadoBodegas.php";</script>';
              echo "Soy mayor";
          }else{
            mysqli_query($con,"insert into detallebodega(idBodega,empresaCilindro,pesoCilindro,cantidad,tipoCilindro) 
                    values ($idBodega, '$nombreEmpresa', $cilindro,$cantidad,'$marcaCilindro')") or 
                    die("Problemas en el select" . mysqli_error($con));
                    echo '<script> alert("Registro completado, por favor acepte para continuar..."); window.location = "listadoBodegas.php";</script>';
          }

      }
  }
  
}


  
?>