<?php
require('fpdf/fpdf.php');

require '../modelo/producto.class.php';

class PDF extends FPDF
{


// Simple table
function BasicTable($header, $data)
{
     $x=0;
     // Header
    foreach($header as $col){
         $x++;
        if ($x=='1') {
           
        $this->Cell(25,7,$col,1);
        }else if ($x=='2') {
           
        $this->Cell(80,7,$col,1);
        }else if ($x=='3') {
           
        $this->Cell(15,7,$col,1);
        }else if ($x=='4'||$x=='7') {
           
        $this->Cell(25,7,$col,1);
        }else{

        $this->Cell(45,7,$col,1);
        }
    }

    $this->Ln();
    // Data
    foreach($data as $row)
    {
        $i=0;
        foreach($row as $col){
  $i++;
            if ($i=='1') {
           
        $this->Cell(25,7,$col,1);
        }else if ($i=='2') {
           
        $this->Cell(80,7,$col,1);
        }else if ($i=='3') {
           
        $this->Cell(15,7,$col,1);
        }else if ($i=='4'||$i=='7') {
           
        $this->Cell(25,7,$col,1);
        }else{

        $this->Cell(45,7,$col,1);
        }

          
        }

        $this->Ln();
    }
}

// Page header
function Header()
{
    // Logo
    $this->Image('../vista/default/images/logo.png',10,6,80);
    // Arial bold 15
    $this->SetFont('Arial','B',15);

    // Move to the right
    $this->Cell(150);

     // Title
    $this->Cell(90,10,'DEPARTAMENTO ALMACEN DE INSUMOS',0,0,'C');
// Line break
    $this->Ln(10);
    // Move to the right
    $this->Cell(180);
    // Title
    $this->Cell(30,10,'CONTROL DE EXISTENCIA',0,0,'C');
    
    // Line break
    $this->Ln(10);
    // Move to the right
    $this->Cell(180);
    // Title
    $this->Cell(30,10,'PLANTA :  EL CENTINELA',0,0,'C');
     // Line break
    $this->Ln(10);
}
}

$pdf = new PDF('L');
// Column headings  	 	 		 
$header = array( 'Codigo', 'Nombre', 'U/M','Inv. Inicial','Entrada Mercancia','Salida Mercancia','Inv. Final');
// Data loading
//$data = $pdf->LoadData('countries.txt');
$modelo=new Producto();
$data =$modelo->listadoMes();

$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable($header,$data);

$pdf->Output();
?>