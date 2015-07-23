<?php
require_once "Controlador.php";
require 'modelo/producto.class.php';
/**
* 
*/
class ProductoControlador extends controlador
{
	

function inicio()
   {
  $pagina=$this->load_template('Almacen - Producto');
  //logueado

  $html = $this->load_page('vista/default/modulos/producto/m.consulta.php');
  $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
  $this->view_page($pagina);
   }

	   /* METODO QUE MUESTRA LA PAGINA PRINCIPAL CUANDO NO EXISTEN NUEVAS ORDENES
   OUTPUT
   HTML | codigo html de la pagina   
   */
   function consultar()
   {
    $modelo= new Producto();

    $resultado=$modelo->consultar($_POST['username']);
    if ($resultado!='') {
           $pagina=$this->load_template('Almacen - Producto');

            ob_start();
            
            $data=$resultado['0'];
            //carga la tabla de la seccion de VIEW
              include 'vista/default/modulos/producto/m.modificar.php';
            $table = ob_get_clean();  
            //realiza el parseado 
            $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);  


        $this->view_page($pagina);
    }else{
$_SESSION['alerta']='No existe el producto';
$this->inicio();
    }
   }
  
  function nuevo()
   {
  $pagina=$this->load_template('Almacen - Producto');
  $html = $this->load_page('vista/default/modulos/producto/m.nuevo.php');
  $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
  $this->view_page($pagina);
   }

  function modificar()
   {
$modelo=new Producto();
  
  
 $modelo->modificar(
  $_POST['nombre'],
  $_POST['cantidad'],
  $_POST['descripcion'],
  $_POST['observacion'],
    $_POST['unidad'],
      $_POST['codigo'],
  $_POST['id']
  );
 $_SESSION['alerta']='Producto modificado con exito ';
  $this->inicio();
   }
   
function registrar()
   {
    $modelo=new Producto();
if ($modelo->consultar($_POST['nombre'])!='') {
    $_SESSION['alerta']='El producto ya existe'; 
  return $this->nuevo();
  }
$modelo=new Producto();
 $modelo->registar(
  $_POST['nombre'],
  $_POST['cantidad'],
  $_POST['descripcion'],
  $_POST['observacion'],
      $_POST['unidad'],
      $_POST['codigo']
  );
$_SESSION['alerta']='Nuevo producto registrado';
$this->inicio();
   }

function eliminar()
   {
 $modelo=new Producto();

 if ($modelo->eliminar(
  $_POST['id']
  )) {
 $_SESSION['alerta']='Producto eliminado con exito ';
 }else{
   $_SESSION['alerta']='Producto no se puedo eliminar tiene relacion con otros modulos ';
 }
 
 
$this->inicio();
   }

}

?>