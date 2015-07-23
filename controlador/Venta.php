<?php
require_once "Controlador.php";
require 'modelo/producto.class.php';
require 'modelo/venta.class.php';
/**
* 
*/
class VentaControlador extends controlador
{
	


  
   function nuevo()
   {
    $modelo= new Producto();

        $resultado=$modelo->listado();
        if ($resultado!='') {
      $pagina=$this->load_template('Almacen - Venta');
      $data=$resultado['0'];
        ob_start();
      include 'vista/default/modulos/venta/m.nuevo.php';
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
  



      $producto= new Producto();
       $restado=$producto->restar(
        $_POST['cantidad'],
        $_POST['id_producto']
        );


      if ($restado=='') {
              $modelo=new Venta();
             $modelo->registar(
              $_POST['id_producto'],
              $_POST['cantidad'],
              $_POST['observacion']
              );

             

            $_SESSION['alerta']='Nueva venta registrado';
            $this->nuevo();
      }else{

            $_SESSION['alerta']='No hay suficientes productos para la venta, quedan '.$restado;
            $this->nuevo();

      }


   }

}

?>