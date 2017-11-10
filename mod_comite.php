<?php
defined('_JEXEC') or die('Acceso restringido <br/> Buen intento!');

require_once(dirname(__file__) . '/helper.php');
require_once(dirname(__file__) . '/clases/Solicitud.php');
require_once(dirname(__file__) . '/clases/Paginacion.php');


//Entradas
$entrada = new JInput; //Sirve para obtener parametros de las peticiones
$solicitud = new Solicitud;
$usuario = JFactory::getUser();
$documento = JFactory::getDocument();

$RESULTADOS_POR_PAGINA = 5; // sirve para cambiar el numero de resultados por pagina

if (isset($_GET['pagina'])) {
    $PAGINA_ACTUAL = $_GET['pagina'];
} else {
    $PAGINA_ACTUAL = 1;
}

$paginacion = new Paginacion($RESULTADOS_POR_PAGINA, $PAGINA_ACTUAL, $solicitud->contarSolicitudes());

if ($usuario->guest || !autenticarUsuario($usuario->groups)) {
    $plantilla = 'default';
} else {
    $plantilla = 'admin';
}

//Estilos y Scripst
$documento->addStyleSheet(JURI::base(true) . "/modules/mod_comite/css/jquery.fancybox.css", 'text/css', 'screen');
$documento->addStyleSheet(JURI::base(true) . "/modules/mod_comite/css/style.css", 'text/css', 'screen');
$documento->addScript(JURI::base(true) . "/modules/mod_comite/js/jquery-3.2.1.js");
$documento->addScript(JURI::base(true) . "/modules/mod_comite/js/bootstrap.min.js");
$documento->addScript(JURI::base(true) . "/modules/mod_comite/js/jquery.fancybox.js");
$documento->addScript(JURI::base(true) . "/modules/mod_comite/js/script.js");


// Captura de datos del formulario.
$nombre_investigador = $entrada->get("nombre_investigador", NULL, "string");
$nombre_trabajo = $entrada->get("nombre_trabajo", NULL, "string");
$anio = $entrada->get("anio", NULL, "string");
$mes = $entrada->get("mes", NULL, "string");
$tipo_trabajo = $entrada->get("tipo_trabajo", NULL, "string");
$estado = $entrada->get("estado", NULL, "string");

// Guardar solicitudes
if (!is_null($nombre_trabajo) && !is_null($nombre_investigador) && !is_null($anio) && !is_null($mes) && !is_null($tipo_trabajo) && !is_null($estado)) {
    $solicitud->agregarSolicitud($nombre_trabajo, $nombre_investigador, $anio, $mes, $tipo_trabajo);
}


require JModuleHelper::getLayoutPath('mod_comite', $plantilla);