
<?php
if(isset($_POST['submit'])){
    $nameArr = $_POST['name'];
    $emailArr = $_POST['email'];
    $tipoArr = $_POST['tipo'];
    if(!empty($nameArr)){
        for($i = 0; $i < count($nameArr); $i++){
            if(!empty($nameArr[$i])){
                $name = $nameArr[$i];
                $email = $emailArr[$i];
                $tipo = $tipoArr[$i];
                echo $name;
                echo $email;
                echo $tipo."\n";
                //database insert query goes here
            }
        }
    }
    echo $_POST['usuario']."\n";
    echo $_POST['rut']."\n";
    echo $_POST['bodega']."\n";
    echo $_POST['chofer']."\n";
    echo $_POST['direccion']."\n";
    echo $_POST['metodoPago']."\n";
}
?>