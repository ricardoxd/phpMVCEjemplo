<?php
/*
clase para reportes 
autor Carlos Belisario
*/

require_once("fpdf/fpdf.php");
require_once('jpgraph/jpgraph.php');
require_once('jpgraph/jpgraph_pie.php');
require_once ("jpgraph/jpgraph_pie3d.php");

require '../modelo/venta.class.php';
require '../modelo/compra.class.php';
class Reporte extends FPDF
{
     public function __construct($orientation='P', $unit='mm', $format='A4')
  {
   parent::__construct($orientation, $unit, $format);
 } 
public function gaficoPDF($datos = array(),$nombreGrafico = NULL,$ubicacionTamamo = array(),$titulo = NULL)
 { 
  //construccion de los arrays de los ejes x e y
  if(!is_array($datos) || !is_array($ubicacionTamamo)){
   echo "los datos del grafico y la ubicacion deben de ser arreglos";
  }
  elseif($nombreGrafico == NULL){
   echo "debe indicar el nombre del grafico a crear";
  }
  else{ 
   #obtenemos los datos del grafico  
   foreach ($datos as $key => $value){
    $data[] = $value[0];
    $nombres[] = $key; 
    $color[] = $value[1];
   } 
   $x = $ubicacionTamamo[0];
   $y = $ubicacionTamamo[1]; 
   $ancho = $ubicacionTamamo[2];  
   $altura = $ubicacionTamamo[3];  
   #Creamos un grafico vacio
   $graph = new PieGraph(600,400);
   #indicamos titulo del grafico si lo indicamos como parametro
   if(!empty($titulo)){
    $graph->title->Set($titulo);
   }   
   //Creamos el plot de tipo tarta
   $p1 = new PiePlot3D($data);
   $p1->SetSliceColors($color);
   #indicamos la leyenda para cada porcion de la tarta
   $p1->SetLegends($nombres);
   //Añadirmos el plot al grafico
   $graph->Add($p1);
   //mostramos el grafico en pantalla
   $graph->Stroke("$nombreGrafico.png"); 
   $this->Image("$nombreGrafico.png",$x,$y,$ancho,$altura);
   unlink("$nombreGrafico.png");  
  } 
 } 
}
$pdf=new Reporte();//creamos el documento pdf
$pdf->AddPage();//agregamos la pagina
$pdf->SetFont("Arial","B",16);//establecemos propiedades del texto tipo de letra, negrita, tamaño
//$pdf->Cell(40,10,'hola mundo',1);
$pdf->Cell(0,5,"Estadisticas ultimos 12 meses",0,0,'C');

$compra=new Compra();$venta=new Venta();
$nro_compra=$compra->contarAno();
$nro_venta=$venta->contarAno();
$pdf->gaficoPDF(array(
	'Ingresos'=>array($nro_compra['0']['compras'],'red'),
	'Egresos'=>array($nro_venta['0']['ventas'],'blue')
	),'Grafico',array(20,40,170,170),
	'Ingresos '.$nro_compra['0']['compras'].' | Egresos '.$nro_venta['0']['ventas'] 
);
$pdf->Output();


?>