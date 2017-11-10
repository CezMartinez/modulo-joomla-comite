<?php 
	
	defined('_JEXEC') or die('Acceso restringido <br/> Buen intento!');

    function autenticarUsuario($grupo){
        $res = false;
        foreach($grupo as $tipo){
            if($tipo == 3 || $tipo == 4 || $tipo == 5 || $tipo == 7 || $tipo == 8){
                $res = true;
                break;
            }
        }
        return	$res;
    }

    function inicialesMayusculas($palabra){
        return ucwords(trim($palabra));
    }