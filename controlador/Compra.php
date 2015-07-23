<?php
require_once "Controlador.php";
require 'modelo/producto.class.php';
require 'modelo/compra.class.php';
/**
* 
*/
class CompraControlador extends controlador
{
	



  
  function nuevo()
   {
    $modelo= new Producto();

        $resultado=$modelo->listado();
        if ($resultado!='') {
      $pagina=$this->load_template('Almacen - Compra');
      $data=$resultado['0'];
        ob_start();
      include 'vista/default/modulos/compra/m.nuevo.php';
        $html= ob_get_clean();
      $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
      $this->view_page($pagina);

      }else{
    $_SESSION['alerta']='No exiten productos, registre uno';
    $ir=new ProductoControlador();
   $ir->inicio();
       }


   }

 
   
function registrar()
   {
    
$modelo=new Compra();
 $modelo->registar(
  $_POST['id_producto'],
  $_POST['cantidad'],
  $_POST['observacion']
  );

 $producto= new Producto();
 $producto->sumar(
  $_POST['cantidad'],
  $_POST['id_producto']
  );

$_SESSION['alerta']='Nueva compra registrado';
$this->nuevo();
   }



}

?>