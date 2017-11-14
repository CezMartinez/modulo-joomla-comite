<?php

defined('_JEXEC') or die('Acceso restringido');
require_once ('SolicitudHelper.php');

class Solicitud
{
    use SolicitudHelper;

    function __construct()
    {
        date_default_timezone_set("America/El_Salvador");
        $this->date =  date('Y-m-d H:i:s');
    }

    /**
     * @param $resultados_por_pagina
     * @param $mostrar_desde
     * @return mixed
     * Obtiene todas las solicitudes de la base de datos
     */
    function obtenerSolicitudes($resultados_por_pagina,$mostrar_desde){
        $db = JFactory::getDbo();
        $consulta = $db->getQuery(true);
        $consulta->select($db->quoteName(array('id_solicitud','nombre_trabajo', 'nombre_investigador', 'anio', 'mes', 'numero_registro', 'tipo_trabajo','estado', 'fecha_revision','fecha_aprovado','fecha_devuelto','fecha_rechazado')));
        $consulta->from($db->quoteName('#__solicitudes'));
        $consulta->setLimit($resultados_por_pagina,$mostrar_desde); // limite, inicio
        $db->setQuery($consulta);
        return $db->loadAssocList();
    }

    function eliminarSolicitud($id_solicitud){

    }

    function obtenerSolicitudesII(){
        $db = JFactory::getDbo();
        $consulta = $db->getQuery(true);
        $consulta->select($db->quoteName(array('id_solicitud','nombre_trabajo')));
        $consulta->from($db->quoteName('#__solicitudes'));
        $db->setQuery($consulta);
        return $db->loadAssocList();
    }

    /**
     * @param $nombre_trabajo
     * @param $nombre_investigador
     * @param $anio
     * @param $mes
     * @param $tipo_trabajo
     * @param $estado
     * @return string Agrega la solicitud a la base de datos
     * Agrega la solicitud a la base de datos
     */
    function agregarSolicitud($nombre_trabajo, $nombre_investigador, $anio, $mes, $tipo_trabajo,$estado)
    {
        $db = JFactory::getDbo();
        $consulta = $db->getQuery(true);
        $columnas = $this->valoresAGuardar($estado);
        $registro = $this->generarNumeroRegistro($tipo_trabajo);
        $valores = array($db->quote(inicialesMayusculas($nombre_trabajo)),
            $db->quote(inicialesMayusculas($nombre_investigador)),
            $db->quote($anio),
            $db->quote($mes),
            $db->quote($registro),
            $db->quote($tipo_trabajo),
            $db->quote($estado),
            $db->quote($this->date));
        $consulta->insert($db->quoteName('#__solicitudes'))
            ->columns($db->quoteName($columnas))
            ->values(implode(',', $valores));
        $db->setQuery($consulta);
        return ($db->execute()) ? '-se guardo exitosamente-message' : '-fallo al guardarse por un error desconocido-error';
    }

    function actualizarSolicitud($id_solicitud,$nombre_trabajo, $nombre_investigador, $anio, $mes, $tipo_trabajo,$estado){
        $db = JFactory::getDbo();

        $consulta = $db->getQuery(true);

        // campos a actualizar.
        $campos = $this->valoresAActualizar($nombre_trabajo, $nombre_investigador, $anio, $mes, $tipo_trabajo, $estado, $db);

        // condiciones para actualizar
        $condiciones = array(
            $db->quoteName('id_solicitud') . ' = ' . $id_solicitud,
        );
        
        $consulta->update($db->quoteName('#__solicitudes'))->set($campos)->where($condiciones);

        $db->setQuery($consulta);

        $resultado = $db->execute();


        return $resultado;
    }

    function obtenerSolicitud($id_solicitud){
        $db = JFactory::getDbo();
        $consulta = $db->getQuery(true);
        $consulta->select($db->quoteName(array('id_solicitud','nombre_trabajo', 'nombre_investigador', 'anio', 'mes', 'numero_registro', 'tipo_trabajo', 'estado','fecha_revision')));
        $consulta->from($db->quoteName('#__solicitudes'));
        $consulta->where($db->quoteName('id_solicitud')." = ".$db->quote($id_solicitud));

        $db->setQuery($consulta);
        $row = $db->loadAssoc();
        return $row;
    }

}