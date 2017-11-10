<?php

trait SolicitudHelper{

    /**
     * @param $tipo_proyecto
     * @return string
     * Genera un codigo unico por cada solicitud
     */
    function generarNumeroRegistro($tipo_proyecto)
    {
        $cuenta = $this->contarRegistrosPorTipoTrabajo($tipo_proyecto);
        $nombre = '';
        switch ($tipo_proyecto) {
            case 1:
                $nombre = 'tipo1_';
                break;
            case 2:
                $nombre = 'tipo2_';
                break;
            case 3:
                $nombre = 'tipo3_';
                break;
            case 4:
                $nombre = 'tipo4_';
                break;
            case 5:
                $nombre = 'tipo5_';
                break;
        }
        return "$nombre$cuenta";
    }

    /**
     * @param $tipo_trabajo
     * @return string
     * Cuenta los registros de cada tipo y le suma uno a la cuenta de cada registro
     */
    function contarRegistrosPorTipoTrabajo($tipo_trabajo)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('COUNT(*)');
        $query->from($db->quoteName('#__solicitudes'));
        $query->where($db->quoteName('tipo_trabajo') . " = " . $db->quote($tipo_trabajo));
        $db->setQuery($query);
        $cuenta = $db->loadResult();
        return sprintf("%04d", $cuenta + 1); // se cambiar a "%05d" si quiere mas registros
    }

    /**
     * @return mixed
     * obtiene el resultado de todas las solicitudes registradas
     */
    function contarSolicitudes(){
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('COUNT(*)');
        $query->from($db->quoteName('#__solicitudes'));
        $db->setQuery($query);
        $cuenta = $db->loadResult();
        return $cuenta;
    }
}