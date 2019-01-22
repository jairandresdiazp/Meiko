<?php
session_start();
$jsondata = array();
$configuracion = parse_ini_file('../../config.ini', true);
include_once ("../../modelo/conexion.php");
include_once ("../../modelo/Log.class.php");
//controlar el debug de los archivos
if ($configuracion["general"]["Debug"] == false)
{
    error_reporting(0);
}
//iniciamos la session
try
{
    //incluimos el archivo de la clase
    include_once ("../../modelo/documento-modelo.php");
    include_once ("../../modelo/seguridad.class.php");
    //incluimos el archivo de la clase login
    //variable que se encarga de recibir la accion a realizar
    $accion = $_GET['accion'];
    //creamos un nuevo objeto de la clase
    $documento = new Documento();
    //creamos un nuevo objeto de la clase
    $log = new Log();
    //accion definida para cargar un documento
    if ($accion == 1)
    {
        //enviamos los datos recuperados por medio de los geter y seter a la clase
        $documento->setFechaDocumento($_GET['add-document-fecha']);
        $documento->setIdDepartamentoDocumento($_GET['add-document-departamento']);
        $documento->setIdCiudadDocumento($_GET['add-document-ciudad']);
        $documento->setEtiquetaDocumento($_GET['add-document-etiqueta']);
        //invocamo el metodo que se encarga de realizar la accion corespondiente
        if ($documento->Nuevo() == true)
        {
            $jsondata['success'] = true;
            $jsondata['code'] = '00015';
            $jsondata['description'] = "documento cargado exitosamente ";
        }
        else
        {
            $jsondata['success'] = false;
            $jsondata['code'] = '00016';
            $jsondata['description'] = "el documento no se pudo cargar ";
        }
    }
    //accion definida para listar los documentos con un flitro de busqueda
    else if ($accion == 2)
    {
        $resultados = $documento->Buscar();
        $conresultados = false;
        $jsondata['code'] = '00018';
        $jsondata['description'] = "documentos filtrados correctamente en el menu get-documents";
        $jsondata['data'] = "<h2 class='content-sub-heading'>Resultados</h2><div id='card-result' class='card-wrap'>";
        while ($row = $documento->Siguiente($resultados))
        {
            $conresultados = true;
            $jsondata['data'] = $jsondata['data'] . "<div class='col-lg-12 col-md-12 col-sm-12'><div class='card card-alt'><div class='card-main'><div class='card-inner'><p class='card-heading text-alt'>" . $row['Fecha'] . "</p><p><strong>Ciudad:</strong> " . $row['Ciudad'] . "<br/><strong>Departamento:</strong> " . $row['Departamento'] . "<br/><strong>Etiqueta:</strong>" . $row['Etiqueta'] . "<br/></p></div><div class='card-action'><ul class='nav nav-list pull-left'><li><a onclick=\"borrar('" . $row['IdDocumento'] . "')\"><span class='access-hide'>Borrar</span><span class='icon icon-delete'></span></a></li></ul></div></div></div></div>";
        }
        $jsondata['data'] = $jsondata['data'] . "</div>";
        if ($conresultados)
        {
            $jsondata['success'] = true;
        }
        else
        {
            $jsondata['success'] = false;
            $jsondata['data'] = "";
        }
    }
    //accion definida para eliminar un documento especifico
    else if ($accion == 3)
    {
        $documento->setIdDocumento($_POST['get-document-id']);
        if ($documento->Editar())
        {
            $jsondata['success'] = true;
            $jsondata['code'] = '00019';
            $jsondata['description'] = "el documento se elimino correctamente";
        }
        else
        {
            $jsondata['success'] = false;
            $jsondata['code'] = '00020';
            $jsondata['description'] = "error eliminando el documento";
        }
    }
    //si no se indica el numero de la accion a realizar
    else
    {
        header('Location: ../../page-login');
    }
    header('Content-type: application/json; charset=utf-8');
    echo json_encode($jsondata, JSON_FORCE_OBJECT);
}
catch(Exception $e)
{
    $log->write('Error en el controlado de acciones usuario ' . $e->getMessage());
}
?>
