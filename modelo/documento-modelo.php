<?php
include_once("conexion.php");
include_once("Log.class.php");
include_once("seguridad.class.php");
class Documento
{
	//atributos privados de la clase
	private $IdDocumento;
	private $FechaDocumento;
	private $IdDepartamentoDocumento;
	private $IdCiudadDocumento;
	private $EtiquetaDocumento;
	private $cn;
	private $log;
	//constructor de la clase
	public function Documento()
	{
		$this->cn = new datos();
		$this->log = new Log();
	}
	//INICIO
	/* geter y seter de la clase los cuales permiten un acceso seguro y un encapsulamiento rijido a cada uno de los 
	atributos de la clase */
	public function getIdDocumento() 
	{
		return $this->IdDocumento;
	}
	public function setIdDocumento($IdDocumento)
	{
		$this->IdDocumento = $IdDocumento;
	}
	public function getFechaDocumento() 
	{
		return $this->FechaDocumento;
	}
	public function setFechaDocumento($FechaDocumento)
	{
		$this->FechaDocumento = $FechaDocumento;
	}
	public function getIdDepartamentoDocumento() 
	{
		return $this->IdDepartamentoDocumento;
	}
	public function setIdDepartamentoDocumento($IdDepartamentoDocumento)
	{
		$this->IdDepartamentoDocumento = $IdDepartamentoDocumento;
	}
	public function getIdCiudadDocumento() 
	{
		return $this->IdCiudadDocumento;
	}
	public function setIdCiudadDocumento($IdCiudadDocumento)
	{
		$this->IdCiudadDocumento = $IdCiudadDocumento;
	}
	public function getEtiquetaDocumento() 
	{
		return $this->EtiquetaDocumento;
	}
	public function setEtiquetaDocumento($EtiquetaDocumento)
	{
		$this->EtiquetaDocumento = $EtiquetaDocumento;
	}
	//fin
	//metodo encargado de registrar un nuevo documento en la base de datos
	public function Nuevo()
	{
		try
		{
			//por medio del objeto de la clase datos llamamos el metodo encargado de hacer inserciones en la base de datos
			if($this->cn->ejecutar("call SPDocumentoNew('".Documento::getIdDepartamentoDocumento()."','".Documento::getIdCiudadDocumento()."','".Documento::getFechaDocumento()."','".Documento::getEtiquetaDocumento()."')"))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		catch(PDOException $e)
		{
			$this->log->write('Error en la clase Documento metodo nuevo '.$e->getMessage());
		}
	}
	//metodo encargado de editar un documento existente en la base de datos
	public function Editar()
	{
		try
		{
			//por medio del objeto de la clase datos llamamos el metodo encargado de hacer modificaciones en la base de datos
			if($this->cn->ejecutar("call SPDocumentoUpdate('".Documento::getIdDocumento()."')"))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		catch(PDOException $e)
		{
			$this->log->write('Error en la clase Perfil metodo editar '.$e->getMessage());
		}
	}
	//metodo encargado de retornar todos los documentos existentes en la base de datos que coinsidan con un parametro de busqueda
	public function Buscar()
	{
		try
		{
			//por medio del objeto de la clase datos llamamos el metodo encargado de hacer consultas en la base de datos
			return $this->cn->consultar("call SPDocumentoGet ()");
		}
		catch(PDOException $e)
		{
			$this->log->write('Error en la clase Documento metodo buscar '.$e->getMessage());
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
			$this->log->write('Error en la clase Perfil metodo siguiente '.$e->getMessage());
		}
	}
}
?>