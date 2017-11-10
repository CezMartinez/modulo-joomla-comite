<?php

defined('_JEXEC') or die('Acceso restringido');
require_once ('SolicitudHelper.php');

class Solicitud
{
    use SolicitudHelper;

    function __construct()
    {
        date_default_timezone_set("America/El_Salvador");
        $this->date =  date('Y-m-d h:i:s');
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
        $consulta->select($db->quoteName(array('nombre_trabajo', 'nombre_investigador', 'anio', 'mes', 'numero_registro', 'tipo_trabajo', 'fecha_revision')));
        $consulta->from($db->quoteName('#__solicitudes'));
        $consulta->setLimit($resultados_por_pagina,$mostrar_desde); // limite, inicio
        $db->setQuery($consulta);
        return $db->loadAssocList();
    }

    /**
     * @param $nombre_trabajo
     * @param $nombre_investigador
     * @param $anio
     * @param $mes
     * @param $tipo_trabajo
     * @return string
     * Agrega la solicitud a la base de datos
     */
    function agregarSolicitud($nombre_trabajo, $nombre_investigador, $anio, $mes, $tipo_trabajo)
    {
        $db = JFactory::getDbo();
        $consulta = $db->getQuery(true);
        $columnas = array('nombre_trabajo', 'nombre_investigador', 'anio', 'mes', 'numero_registro', 'tipo_trabajo', 'fecha_revision');
        $registro = $this->generarNumeroRegistro($tipo_trabajo);
        $valores = array($db->quote(inicialesMayusculas($nombre_trabajo)),
            $db->quote(inicialesMayusculas($nombre_investigador)),
            $db->quote($anio),
            $db->quote($mes),
            $db->quote($registro),
            $db->quote($tipo_trabajo),
            $db->quote($this->date));
        $consulta->insert($db->quoteName('#__solicitudes'))
            ->columns($db->quoteName($columnas))
            ->values(implode(',', $valores));
        $db->setQuery($consulta);
        return ($db->execute()) ? '-se guardo exitosamente-message' : '-fallo al guardarse por un error desconocido-error';
    }

}