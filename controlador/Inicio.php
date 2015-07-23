<?php
require_once "Controlador.php";
require 'modelo/usuario.class.php';
/**
* 
*/
class InicioControlador extends controlador
{
	



	   /* METODO QUE MUESTRA LA PAGINA PRINCIPAL CUANDO NO EXISTEN NUEVAS ORDENES
   OUTPUT
   HTML | codigo html de la pagina   
   */
  function principal()
   {
  $pagina=$this->load_template('Almacen');
	//logueado
  $html = $this->load_page_datos('vista/default/modulos/m.principal.php');
  $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
  $this->view_page($pagina);
   }
  

   function login()
   {
  $pagina=$this->load_template('Almacen');
//no iniciado
  $html = $this->load_page('vista/default/modulos/m.login.php');
  $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$html , $pagina);
  $this->view_page($pagina);
   }

function setLogin($usuario=NULL,$clave=NULL)
   {

	$modelo=new Usuario();
	$consulta=$modelo->getlogin($usuario,$clave);

if ($consulta!='') {
	$_SESSION['logeado']=true;
	$_SESSION['usuario']=$usuario;
	$this->principal();
}else{
  $_SESSION['alerta']='Usuario o Contraseña Invalida';
	$this->login();
}

   }

}

?>