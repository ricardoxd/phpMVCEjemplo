<?php
/*
 CLASE PARA LA GESTION DE LOS UNIVERSITARIOS
*/
require_once "db.class.php";

class Producto extends database {

	/* REALIZA UNA CONSULTA A LA BASE DE DATOS EN BUSCA DE  REGISTROS UNIVERSITARIOS DADOS COMO
	     PARAMETROS LA "CARRERA" Y LA "CANTIDAD" DE REGISTROS A MOSTRAR
		 INPUT:
		 $carrera | nombre de la carrera a buscar
		 $limit | cantidad de registros a mostrar
		 OUTPUT:
		 $data | Array con los registros obtenidos, si no existen datos, su valor es una cadena vacia
	 */
function consultar($nombre=NULL)
	{
		//conexion a la base de datos
		$this->conectar();		
		$query = $this->consulta("SELECT * FROM producto WHERE nombre='$nombre' or id_producto='$nombre';");
 	    $this->disconnect();					
		if($this->numero_de_filas($query) > 0) // existe -> datos correctos
		{		
				//se llenan los datos en un array
				while ( $tsArray = $this->fetch_assoc($query) ) 
					$data[] = $tsArray;			
		
				return $data;
		}else
		{	
			return '';
		}			
	}
	public function listado()
	{
		//conexion a la base de datos
		$this->conectar();		
		$query = $this->consulta("SELECT * FROM producto;");
 	    $this->disconnect();					
		if($this->numero_de_filas($query) > 0) // existe -> datos correctos
		{		
				//se llenan los datos en un array
				while ( $tsArray = $this->fetch_assoc($query) ) 
					$data[] = $tsArray;			
		
				return $data;
		}else
		{	
			return '';
		}			
	}
		function registar($nombre=NULL,$cantidad=NULL,$descripcion=NULL,$observacion=NULL,$unidad=NULL,$codigo=NULL)
	{
		//conexion a la base de datos
		$this->conectar();		
		$query = $this->consulta("insert into producto (nombre,cantidad,descripcion,observacion,unidad,codigo)values ('$nombre','$cantidad','$descripcion','$observacion','$unidad','$codigo');");
 	    $this->disconnect();					
					
	}
	function modificar($nombre=NULL,$cantidad=NULL,$descripcion=NULL,$observacion=NULL,$unidad=NULL,$codigo=NULL,$id_producto=NULL)
	{
		//conexion a la base de datos
		$this->conectar();		
		$query = $this->consulta("update producto set nombre='$nombre',cantidad='$cantidad',descripcion='$descripcion',observacion='$observacion',unidad='$unidad',codigo='$codigo' where id_producto='$id_producto';");
 	    $this->disconnect();					
					
	}
	function sumar($cantidad=NULL,$id_producto=NULL)
	{
		//conexion a la base de datos
		$this->conectar();		
		$query = $this->consulta("SELECT * FROM producto WHERE  id_producto='$id_producto';");
 	    			$data='';		
		if($this->numero_de_filas($query) > 0) // existe -> datos correctos
		{		
				//se llenan los datos en un array
				while ( $tsArray = $this->fetch_assoc($query) ) 
					$data = $tsArray['cantidad'];			
			
		}
	
		$cantidad+=$data;	
		$query = $this->consulta("update producto set cantidad='$cantidad' where id_producto='$id_producto';");
 	    $this->disconnect();					
					
	}
	function restar($cantidad=NULL,$id_producto=NULL)
	{
		//conexion a la base de datos
		$this->conectar();		
		$query = $this->consulta("SELECT * FROM producto WHERE  id_producto='$id_producto';");
 	    			$data='';		
		if($this->numero_de_filas($query) > 0) // existe -> datos correctos
		{		
				//se llenan los datos en un array
				while ( $tsArray = $this->fetch_assoc($query) ) 
					$data = $tsArray['cantidad'];			
			
		}
	
		$cantidad=$data-$cantidad;	
		if ($cantidad<0) {
			return $data;
		}
		$query = $this->consulta("update producto set cantidad='$cantidad' where id_producto='$id_producto';");
 	    $this->disconnect();	
 	    return '';				
					
	}
function eliminar($id_producto=NULL)
	{
		//conexion a la base de datos
		$this->conectar();		

$query = $this->consulta("SELECT * FROM compra,venta WHERE venta.id_producto='$id_producto' or compra.id_producto='$id_producto';");
 	 			
		if($this->numero_de_filas($query) > 0) // existe -> datos correctos
		{		
			return false;	
		}else
		{	
		$query = $this->consulta("delete from producto  where id_producto='$id_producto';");
 	    $this->disconnect();	
		}

		return true;					
					
	}
	public function listadoMes()
	{
		//conexion a la base de datos
		$this->conectar();		
		$query = $this->consulta(
			"SELECT producto.codigo, producto.nombre, producto.unidad, producto.cantidad - (
SELECT sum( cantidad ) AS compras
FROM compra
WHERE id_producto = producto.id_producto ) + (
SELECT sum( cantidad ) AS ventas
FROM venta
WHERE id_producto = producto.id_producto ) AS inicia, (

SELECT sum( cantidad ) AS compras
FROM compra
WHERE id_producto = producto.id_producto
) AS entradas, (

SELECT sum( cantidad ) AS ventas
FROM venta
WHERE id_producto = producto.id_producto
) AS salidas, producto.cantidad
FROM producto ;");
 	    $this->disconnect();					
		if($this->numero_de_filas($query) > 0) // existe -> datos correctos
		{		
				//se llenan los datos en un array
				while ( $tsArray = $this->fetch_assoc($query) ) 
					$data[] = $tsArray;			
		
				return $data;
		}else
		{	
			return '';
		}			
	}
	
}

?>