<?php
//Esta es la página de la factura la cual muesta el total de la compra y los porductos comprados. Y puede tener la factura imprimida.
require('fpdf/fpdf.php');
define('EURO',chr(128));
include 'global/config.php';
include 'global/conexion.php';
include 'global/carrito.php';


if (!isset($_SESSION["usuario"])) {
    header("Location:login.php");
    session_start();
}

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->Image('img/factura.jpg','0','0','210','297','JPG'); 

    // Logo
    $this->Image('img/logo1.jpg',180,5,30,20,'jpg');
    // Arial bold 15
    $this->SetFont('Arial','B',19);
    // Movernos a la derecha
    $this->Cell(75);
    

    // Título
    $this->Cell(40,10,'Mercedes-Benz',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this -> SetTextColor(68, 78, 68);
    $this->Cell(190,10,utf8_decode('Automóviles comprados'),0,0,'C');

    $this->Ln(20);

    $this -> Cell(40, 10 ,"Item",1 ,0, 'C', 0);

    $this -> Cell(80, 10 ,"Nombre",1 ,0, 'C', 0);
   
    $this -> Cell(70, 10 ,"Precio",1 ,1, 'C', 0);

}

// Pie de página
function Footer()
{
    $this->Ln(0);
    $this->SetFont('Arial','B',19);
    $this -> SetTextColor(68, 78, 68);

    $this -> Cell(275, 10 ,"Precio Total:",0 ,0, 'C', 0);

    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','B',12);

    $this->Write(10,'Mercedes-Benz S.L');
    // Número de página
    $this->Image('img/logo1.jpg',15,260,30,20,'jpg');

    $this-> Ln();

    $this->Cell(190,3,date('d/m/Y'),0,1, 'R');

}
}

$pdf = new PDF();
$pdf -> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',14);


if (!empty($_SESSION['CARRITO'])) {

$i=1;
$total=0;
foreach($_SESSION['CARRITO'] as $indice=>$producto){ 
        $pdf -> Cell(40, 10 ,$i,1 ,0, 'C', 0);
        $pdf -> Cell(80, 10 ,$producto['NOMBRE'],1 ,0, 'C', 0);
        $pdf -> Cell(70, 10 ,number_format($producto['PRECIO'],2).EURO,1 ,0, 'C', 0);
        $total=$total+($producto['PRECIO']*$producto['CANTIDAD']); 
        $pdf -> Ln();
        $i++;
    }     
    $pdf -> Cell(355, 11 ,number_format($total,2).EURO,0 ,0, 'C', 0);

}

$pdf->Output('', 'factura-.pdf');
?>