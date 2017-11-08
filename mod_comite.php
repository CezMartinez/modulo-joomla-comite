<?php 

	defined('_JEXEC') or die('Acceso restringido <br/> Buen intento!');

	JHtml::_('jquery.framework');
	require_once (dirname(__file__).'/helper.php');
	require_once (dirname(__file__).'/clasess/solicitudes.php');
	

	$entrada = new JInput;
	$solicitud = new Solicitudes;
	$user =  JFactory::getUser();
	$document = JFactory::getDocument();

	$document->addStyleSheet(JURI::base(true)."modules/mod_comite/css/style.css",'text/css','screen');
	$document->addScript(JURI::base(true)."modules/mod_comite/js/script.css");

 ?>cearan