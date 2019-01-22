<?php
include_once("conexion.php");
include_once("Log.class.php");
include_once("seguridad.class.php");
class Ciudad
{
	//atributos privados de la clase
	private $IdCiudad;
	private $Nombre;
	private $cn;
	private $log;
	//constructor de la clase
	public function Ciudad()
	{
		$this->cn = new datos();
		$this->log = new Log();
	}
	//INICIO
	/* geter y seter de la clase los cuales permiten un acceso seguro y un encapsulamiento rijido a cada uno de los 
	atributos de la clase */
	public function getIdCiudad() 
	{
		return $this->IdCiudad;
	}
	public function setIdCiudad($IdCiudad)
	{
		$this->IdCiudad = $IdCiudad;
	}
	public function getNombre() 
	{
		return $this->Nombrel;
	}
	public function setNombre($Nombrel)
	{
		$this->Nombrel = $Nombrel;
	}
	//fin
	//metodo encargado de retornar todos los login existentes en la base de datos que coinsidan con un parametro de busqueda
	public function Buscar()
	{
		try
		{
			//por medio del objeto de la clase datos llamamos el metodo encargado de hacer consultas en la base de datos
			return $this->cn->consultar("call SPCiudadGet('".Ciudad::getIdCiudad()."')");
		}
		catch(PDOException $e)
		{
			$this->log->write('Error en la clase Ciudad metodo buscar '.$e->getMessage());
		}
	}
	//metodo encargado de mostrar el sigiente registro de un conjunto de datos
	public function Siguiente($result)
	{
		try
		{
			//por medio del objeto de la clase datos llamamos el metodo encargado de hacer un salto al sigiente registro de un conjunto de datos
			return $this->cn->resultados($result);
		}
		catch(PDOException $e)
		{
			$this->log->write('Error en la clase Ciudad metodo siguiente '.$e->getMessage());
		}
	}
}
?>