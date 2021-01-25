<?php
include('conexion/conexion.php');
if(isset($_POST['submit'])){
    $nameArr = $_POST['name'];
    $emailArr = $_POST['email'];
    $tipoArr = $_POST['tipo'];
    $empresaArr = $_POST['empresa'];
    $idDevolucion = $_POST['devolucion'];
    if(!empty($nameArr)){
        for($i = 0; $i < count($nameArr); $i++){
            if(!empty($nameArr[$i])){
                $name = $nameArr[$i];
                $email = $emailArr[$i];
                $tipo = $tipoArr[$i];
                $empresa = $empresaArr[$i];

                $tipoCilindro = mysqli_query($con, "select * from tipoCilindro where idTipo = $tipo") or
                die("Problemas en el select:" . mysqli_error($con));
                $typeCilindro = mysqli_fetch_array($tipoCilindro);

                $empresaCilindro = mysqli_query($con, "select * from empresascilindros where idEmpresa = $empresa") or
                die("Problemas en el select:" . mysqli_error($con));
                $marcaCilindro = mysqli_fetch_array($empresaCilindro);

                $empresaNombre = $marcaCilindro['nombreEmpresa'];
                $nombreTipo = $typeCilindro['nombreTipo'];


                //echo "insert into detalledevoluciones(idDevolucion,cantidad,cilindro,tipoCilindro) values ($idDevolucion, $name, $email,'$nombreTipo')";
                mysqli_query($con, "insert into detalledevoluciones(idDevolucion,cantidad,cilindro,tipoCilindro,empresaCilindro) 
                    values ($idDevolucion, $name, $email,'$nombreTipo','$empresaNombre')") or 
                    die("Problemas en el select" . mysqli_error($con));
                    echo '<script> alert("Registro completado, por favor acepte para continuar..."); window.location = "listarDevoluciones.php";</script>';
            }
        }
    }
}
?>