<?php
require('fpdf/fpdf.php');

require '../modelo/venta.class.php';

class PDF extends FPDF
{


// Simple table
function BasicTable($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(47,7,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(47,6,$col,1);
        $this->Ln();
    }
}

// Page header
function Header()
{
    // Logo
   $this->Image('../vista/default/images/logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Egresos ultimo 7 dias',0,0,'C');
    // Line break
    $this->Ln(20);
}
}

$pdf = new PDF();
// Column headings  	 	 		 
$header = array( 'Cantidad', 'Producto', 'Fecha','Observacion');
// Data loading
//$data = $pdf->LoadData('countries.txt');
$modelo=new Venta();
$data =$modelo->listadoSemana();

$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable($header,$data);

$pdf->Output();
?>