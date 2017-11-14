<?php

defined('_JEXEC') or die('Acceso restringido <br/> Buen intento!');
JHtml::_('jquery.framework');
require_once(dirname(__file__) . '/helper.php');
require_once(dirname(__file__) . '/clases/Solicitud.php');
require_once(dirname(__file__) . '/clases/Paginacion.php');


//Entradas
$entrada = new JInput; //Sirve para obtener parametros de las peticiones
$solicitud = new Solicitud;
$usuario = JFactory::getUser();
$documento = JFactory::getDocument();

//Estilos y Scripst
$documento->addStyleSheet(JURI::base(true) . "/modules/mod_comite/css/jquery.fancybox.css", 'text/css', 'screen');
$documento->addStyleSheet(JURI::base(true) . "/modules/mod_comite/css/select2.css", 'text/css', 'screen');
$documento->addStyleSheet(JURI::base(true) . "/modules/mod_comite/css/animate.css", 'text/css', 'screen');
$documento->addStyleSheet(JURI::base(true) . "/modules/mod_comite/css/style.css", 'text/css', 'screen');
$documento->addScript(JURI::base(true) . "/modules/mod_comite/js/jquery.fancybox.js");
$documento->addScript(JURI::base(true) . "/modules/mod_comite/js/select2.min.js");
$documento->addScript(JURI::base(true) . "/modules/mod_comite/js/script.js");

// Sirven para mostrar formulario de eliminar
$mostrar_editar = $entrada->get('editar');

// Sirven para mostrar formulario de editar
$mostrar_eliminar = $entrada->get('eliminar');

// Solicitud a Eliminar o Editar
$id_solicitud = $entrada->get('id_solicitud');

// Paginacion
$RESULTADOS_POR_PAGINA = 5; // sirve para cambiar el numero de resultados por pagina
$PAGINA_ACTUAL = $entrada->get('pagina') ? $entrada->get('pagina') : 1;
$paginacion = new Paginacion($RESULTADOS_POR_PAGINA, $PAGINA_ACTUAL, $solicitud->contarSolicitudes());

//Plantilla a mostrar segun permisos de usuario
if ($usuario->guest || !autenticarUsuario($usuario->groups)) {
    $plantilla = 'default';
} else {
    $plantilla = 'admin';
}

// Captura de datos del formulario para guardar.
$nombre_investigador = $entrada->get("nombre_investigador", NULL, "string");
$nombre_trabajo = $entrada->get("nombre_trabajo", NULL, "string");
$anio = $entrada->get("anio", NULL, "string");
$mes = $entrada->get("mes", NULL, "string");
$tipo_trabajo = $entrada->get("tipo_trabajo", NULL, "string");
$estado = $entrada->get("estado", NULL, "string");

// Captura de datos del formulario editar
$n_nombre_investigador = $entrada->get("n_nombre_investigador", NULL, "string");
$n_nombre_trabajo = $entrada->get("n_nombre_trabajo", NULL, "string");
$n_anio = $entrada->get("n_anio", NULL, "string");
$n_mes = $entrada->get("n_mes", NULL, "string");
$n_tipo_trabajo = $entrada->get("n_tipo_trabajo", NULL, "string");
$n_estado = $entrada->get("n_estado", NULL, "string");


// Guardar solicitudes
if (!is_null($nombre_trabajo) && !is_null($nombre_investigador) && !is_null($anio) && !is_null($mes) && !is_null($tipo_trabajo) && !is_null($estado)) {
    $solicitud->agregarSolicitud($nombre_trabajo, $nombre_investigador, $anio, $mes, $tipo_trabajo,$estado);
}
// Editar solicitudes
if (!is_null($n_nombre_trabajo) && !is_null($n_nombre_investigador) && !is_null($n_anio) && !is_null($n_mes) && !is_null($n_tipo_trabajo) && !is_null($n_estado)) {
    $solicitud->actualizarSolicitud($id_solicitud,$n_nombre_trabajo,$n_nombre_investigador,$n_anio,$n_mes,$n_tipo_trabajo,$n_estado);
}


require JModuleHelper::getLayoutPath('mod_comite', $plantilla);