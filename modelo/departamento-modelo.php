<?php
include_once("conexion.php");
include_once("Log.class.php");
include_once("seguridad.class.php");
class Departamento
{
	//atributos privados de la clase
	private $IdDepartamento;
	private $Nombre;
	private $cn;
	private $log;
	//constructor de la clase
	public function Departamento()
	{
		$this->cn = new datos();
		$this->log = new Log();
	}
	//INICIO
	/* geter y seter de la clase los cuales permiten un acceso seguro y un encapsulamiento rijido a cada uno de los 
	atributos de la clase */
	public function getIdDepartamento() 
	{
		return $this->IdDepartamento;
	}
	public function setIdDepartamento($IdDepartamento)
	{
		$this->IdDepartamento = $IdDepartamento;
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
			return $this->cn->consultar("call SPDepartamentoGet()");
		}
		catch(PDOException $e)
		{
			$this->log->write('Error en la clase Departamento metodo buscar '.$e->getMessage());
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
			$this->log->write('Error en la clase Departamento metodo siguiente '.$e->getMessage());
		}
	}
}
?>