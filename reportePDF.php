<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{

    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(60);
        // Título
        $this->Cell(70,10,'Reporte de devoluciones Servigas',0,0,'C');
        // Salto de línea
        $this->Ln(20);
    }
    
    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    function cabeceraHorizontal($cabecera)
    {
       
        $this->SetXY(10, 70);
        $this->SetFont('Arial','B',10);
        foreach($cabecera as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
            $this->Cell(48,7, utf8_decode($fila),1, 0 , 'L' );
        }
    }
 
    function datosHorizontal()
    {
        $this->SetXY(10,77);
        $this->SetFont('Arial','',10);
        //Siendo un array tipo: $datos => $fila
        //Significa que $datos tiene 'nombre' 'apellido' 'matricula'
        //$fila tiene cada valor de los antes mencionados
        include('conexion/conexion.php');
        $idDevolucion = $_GET['id'];
        $registros = mysqli_query($con, "select * from detalledevoluciones where idDevolucion = $idDevolucion") or
        die("Problemas en el select:" . mysqli_error($con));
        while ($reg = mysqli_fetch_array($registros)) {
            $this->Cell(48,7, utf8_decode($reg['cantidad']),1, 0 , 'L' );
            $this->Cell(48,7, utf8_decode($reg['cilindro']),1, 0 , 'L' );
            $this->Cell(48,7, utf8_decode($reg['empresaCilindro']),1, 0 , 'L' );
            $this->Cell(48,7, utf8_decode($reg['tipoCilindro']),1, 0 , 'L' );
            $this->Ln();//Salto de línea para generar otra fila
        }
    }

    function cabeceraVertical($cabecera)
    {
        $this->SetXY(10, 40);
        $this->SetFont('Arial','B',10);
        foreach($cabecera as $columna)
        {
            //Parámetro con valor 2, hace que la cabecera sea vertical
            $this->Cell(30,7, utf8_decode($columna),1, 2 , 'L' );
        }
    }
 
    function datosVerticales($datos)
    {
        $this->SetXY(40, 40); //40 = 10 posiciónX_anterior + 30ancho Celdas de cabecera
        $this->SetFont('Arial','',10); //Fuente, Normal, tamaño
        foreach($datos as $columna)
        {
            $this->Cell(20,7, utf8_decode($columna),1, 2 , 'L' );
        }
    }
 
    //Integrando cabecera y datos en un solo método
    function tablaHorizontal($cabeceraHorizontal)
    {
        $this->cabeceraHorizontal($cabeceraHorizontal);
        $this->datosHorizontal();
    }
 
} // FIN Class PDF

$pdf = new PDF();
 
$pdf->AddPage();

$miCabecera = array('Chofer', 'Fecha');

include('conexion/conexion.php');
        $idDevolucion = $_GET['id'];
        $registros = mysqli_query($con, "select * from cabeceradevolucion where idDevolucion = $idDevolucion") or
        die("Problemas en el select:" . mysqli_error($con));
        $reg2 = mysqli_fetch_array($registros);
        $idChofer = $reg2['idChofer'];

        $chofer = mysqli_query($con, "select * from usuarios where idUsuario = $idChofer") or
        die("Problemas en el select:" . mysqli_error($con));
        $reg3 = mysqli_fetch_array($chofer);

$misDatos = array($reg3['nombreUsuario'], $reg2['fechaDevolucion']);
 
$pdf->cabeceraVertical($miCabecera);
$pdf->datosVerticales($misDatos);
 
$miCabecera = array('Cantidad ', 'Kg', 'Empresa', 'Tipo');
 
 
$pdf->tablaHorizontal($miCabecera);
 
$pdf->Output(); //Salida al navegador
?>