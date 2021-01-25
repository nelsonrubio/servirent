
<?php
include('conexion/conexion.php');
    $id= $_POST['id'];
     mysqli_query($con, "delete from usuarios where idUsuario=$id") or
    die("Problemas en el select:" . mysqli_error($con));
    if(mysqli_affected_rows($con)){
        echo "Usuario eliminado correctamente";
    }else{
        echo"No se puedo eliminar el usuario.";
    }
 
?>