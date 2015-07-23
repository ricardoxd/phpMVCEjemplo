<?php
/*
 CLASE PARA LA GESTION DE LOS UNIVERSITARIOS
*/
require_once "db.class.php";

class Venta extends database {

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
		function registar($nombre=NULL,$cantidad=NULL,$observacion=NULL)
	{
		//conexion a la base de datos
		$this->conectar();		
		$query = $this->consulta("insert into venta (id_producto,cantidad,observacion)values ('$nombre','$cantidad','$observacion');");
 	   


 	    $this->disconnect();					
					
	}
	
	public function listadoSemana()
	{
		//conexion a la base de datos
		$this->conectar();		
		$query = $this->consulta("SELECT venta.cantidad,
producto.nombre,
fecha,
venta.observacion FROM venta,producto where venta.id_producto=producto.id_producto and venta.fecha >= curdate() - interval 7 day;");
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
	public function listadoMes()
	{
		//conexion a la base de datos
		$this->conectar();		
		$query = $this->consulta("SELECT venta.cantidad,
producto.nombre,
fecha,
venta.observacion FROM venta,producto where venta.id_producto=producto.id_producto and venta.fecha >= curdate() - interval 30 day;");
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
	public function contar()
	{
		
$this->conectar();		
		$query = $this->consulta("SELECT count(id_venta) AS ventas FROM venta where  venta.fecha >= curdate() - interval 30 day;");
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
	public function contarAno()
	{
		
$this->conectar();		
		$query = $this->consulta("SELECT count(id_venta) AS ventas FROM venta where  venta.fecha >= curdate() - interval 1 year;");
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