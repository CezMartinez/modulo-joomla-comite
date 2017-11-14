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

    function valoresAGuardar($estado){
        $columnas = array('nombre_trabajo', 'nombre_investigador', 'anio', 'mes', 'numero_registro', 'tipo_trabajo','estado');
        switch ($estado){
            case 1: //revisicion
                array_push($columnas,'fecha_revision');
                break;
            case 2: //aprovado
                array_push($columnas,'fecha_aprovado');
                break;
            case 3: //devuelto con observaciones
                array_push($columnas,'fecha_devuelto');
                break;
            case 4: //rechazado
                array_push($columnas,'fecha_rechazado');
                break;
        }
        return $columnas;
    }

    function valoresAActualizar($nombre_trabajo, $nombre_investigador, $anio, $mes, $tipo_trabajo, $estado, $db){
        $columnas = array(
            $db->quoteName('nombre_trabajo') . ' = ' . $db->quote($nombre_trabajo),
            $db->quoteName('nombre_investigador') . ' = ' . $db->quote($nombre_investigador),
            $db->quoteName('anio') . ' = ' . $db->quote($anio),
            $db->quoteName('mes') . ' = ' . $db->quote($mes),
            $db->quoteName('tipo_trabajo') . ' = ' . $db->quote($tipo_trabajo),
            $db->quoteName('estado') . ' = ' . $db->quote($estado),
        );

        switch ($estado){
            case 1: //revisicion
                array_push($columnas,$db->quoteName('fecha_revision') . ' = ' . $db->quote($this->date));
                break;
            case 2: //aprovado
                array_push($columnas,$db->quoteName('fecha_aprovado') . ' = ' . $db->quote($this->date));
                break;
            case 3: //devuelto con observaciones
                array_push($columnas,$db->quoteName('fecha_devuelto') . ' = ' . $db->quote($this->date));
                break;
            case 4: //rechazado
                array_push($columnas,$db->quoteName('fecha_rechazado') . ' = ' . $db->quote($this->date));
                break;
        }
        return $columnas;
    }
}