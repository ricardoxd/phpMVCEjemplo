<?php
session_start();
 require 'controlador/Inicio.php';

     //se instancia al controlador 
 $mvc = new InicioControlador();

if(!empty($_SESSION['logeado']) && !empty($_SESSION['usuario']))
{
   
		  if(  isset($_GET['action']) &&$_GET['action']== 'salir' ) //salir
			 {
			    session_destroy();
			    echo "<meta http-equiv='refresh' content='0; url=index.php' />";
			 }else if(  isset($_GET['action']) &&$_GET['action']== 'autocompletarproducto' ) //
			 {

			 	header( 'Content-type: text/html; charset=iso-8859-1' );
				//require('modelo/db.class.php');
				$search = $_POST['service'];
				$con=new database();
				$con->conectar();
				$query_services =$con->consulta("SELECT id_producto, nombre FROM producto WHERE nombre like '" . $search . "%'  ORDER BY nombre DESC");

				while ($row_services = mysql_fetch_array($query_services)) {
				    echo '<div ><a class="suggest-element" data="'.$row_services['nombre'].'" id="service'.$row_services['id_producto'].'">'.utf8_encode($row_services['nombre']).'</a></div>';
				}

			 }
			 else if(  isset($_GET['action']) &&$_GET['action']== 'usuario' ) //
			 {
			     require 'controlador/Usuario.php';
				 $mvc = new UsuarioControlador();


				

				 	if( isset($_REQUEST['registar']) )//muestra el buscador y los
						{

						   $mvc->registrar();
						 
						 }
						 else if( isset($_REQUEST['modificar']) )//muestra el buscador y los
						{

						   $mvc->modificar();
						 
						 }
						 else if( isset($_REQUEST['eliminar']) )//muestra el buscador y los
						{

						   $mvc->eliminar();
						 
						 }else if( isset($_REQUEST['consultar']) )//muestra el buscador y los
						{

						   $mvc->consultar();
						 
						 }else if( isset($_REQUEST['nuevo']) )//muestra el buscador y los
						{

						   $mvc->nuevo();
						 
						 }else{
						 	 $mvc->inicio();
						 }

						 	
						 




			 }
			 else if(  isset($_GET['action']) &&$_GET['action']== 'producto' ) //
			 {
			     require 'controlador/Producto.php';
				 $mvc = new ProductoControlador();


				

				 	if( isset($_REQUEST['registar']) )//muestra el buscador y los
						{

						   $mvc->registrar();
						 
						 }
						 else if( isset($_REQUEST['modificar']) )//muestra el buscador y los
						{

						   $mvc->modificar();
						 
						 }
						 else if( isset($_REQUEST['eliminar']) )//muestra el buscador y los
						{

						   $mvc->eliminar();
						 
						 }else if( isset($_REQUEST['consultar']) )//muestra el buscador y los
						{

						   $mvc->consultar();
						 
						 }else if( isset($_REQUEST['nuevo']) )//muestra el buscador y los
						{

						   $mvc->nuevo();
						 
						 }else{
						 	 $mvc->inicio();
						 }

						 	
						 




			 }
			 else if(  isset($_GET['action']) &&$_GET['action']== 'entrada' ) //
			 {
			     require 'controlador/Compra.php';
				 $mvc = new CompraControlador();


				

				 	if( isset($_REQUEST['registar']) )//muestra el buscador y los
						{

						   $mvc->registrar();
						 
						 }
						 else
						{

						   $mvc->nuevo();
						 
						 }
						 	
						 




			 }
			 else if(  isset($_GET['action']) &&$_GET['action']== 'salida' ) //
			 {
			     require 'controlador/Venta.php';
				 $mvc = new VentaControlador();


				

				 	if( isset($_REQUEST['registar']) )//muestra el buscador y los
						{
							echo 'ssssssssssse';
						   $mvc->registrar();
						 
						 }
						else 
						{

						   $mvc->nuevo();
						 
						 }

						 	
						 




			 }
			 else{

		 	 $mvc->principal();
		 	}

  



    
} else if(empty($_SESSION['logeado']) && empty($_SESSION['usuario']))//Si no existe GET o POST -> muestra la pagina principal
 {
		 	if( isset($_POST['username']) && isset($_POST['password']) )//muestra el buscador y los resultados
		 {
		   $mvc->setLogin( $_POST['username'], $_POST['password'] );
		 }else{
		 	 $mvc->login();
		 }

 

 }
?>

