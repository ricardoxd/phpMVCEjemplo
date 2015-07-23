<?php
require_once "Controlador.php";
/**
* 
*/
class UsuarioControlador extends controlador
{
	

function inicio()
   {
  $pagina=$this->load_template('Almacen - Usuario');
  //logueado

  $html = $this->load_page('vista/default/modulos/usuario/m.consulta.php');
  $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
  $this->view_page($pagina);
   }

	   /* METODO QUE MUESTRA LA PAGINA PRINCIPAL CUANDO NO EXISTEN NUEVAS ORDENES
   OUTPUT
   HTML | codigo html de la pagina   
   */
   function consultar()
   {
    $modelo= new Usuario();

    $resultado=$modelo->consultar($_POST['username']);
    if ($resultado!='') {
           $pagina=$this->load_template('Almacen - Usuario');

            ob_start();
            
            $data=$resultado['0'];
            //carga la tabla de la seccion de VIEW
              include 'vista/default/modulos/usuario/m.modificar.php';
            $table = ob_get_clean();  
            //realiza el parseado 
            $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $table , $pagina);  


        $this->view_page($pagina);
    }else{
$_SESSION['alerta']='No existe el usuario';
$this->inicio();
    }
   }
  
  function nuevo()
   {
  $pagina=$this->load_template('Almacen - Usuario');
  $html = $this->load_page('vista/default/modulos/usuario/m.nuevo.php');
  $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
  $this->view_page($pagina);
   }

  function modificar()
   {
$modelo=new Usuario();
  
  
 $modelo->modificar(
  $_POST['username'],
  $_POST['password'],
  $_POST['id']
  );
 $_SESSION['alerta']='Usuario modificado con exito ';
  $this->inicio();
   }
   
function registrar()
   {
    $modelo=new Usuario();
if ($modelo->consultar($_POST['username'])!='') {
    $_SESSION['alerta']='El usuario ya existe'; 
  return $this->nuevo();
  }
$modelo=new Usuario();
 $modelo->registar(
  $_POST['username'],
  $_POST['password']
  );
$_SESSION['alerta']='Nuevo usuario registrado';
$this->inicio();
   }

function eliminar()
   {
 $modelo=new Usuario();
 $modelo->eliminar(
  $_POST['id']
  );
 $_SESSION['alerta']='Usuario eliminado con exito ';
$this->inicio();
   }

}

?>