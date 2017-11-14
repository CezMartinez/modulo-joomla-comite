<?php

defined('_JEXEC') or die('Acceso restringido <br/> Buen intento!');

function autenticarUsuario($grupo)
{
    $res = false;
    foreach ($grupo as $tipo) {
        if ($tipo == 3 || $tipo == 4 || $tipo == 5 || $tipo == 7 || $tipo == 8) {
            $res = true;
            break;
        }
    }
    return $res;
}

function inicialesMayusculas($palabra)
{
    return ucwords(trim($palabra));
}

function mes($mes)
{
    $nombre = "";
    switch ($mes) {
        case 1:
            $nombre = "Enero";
            break;
        case 2:
            $nombre = "Febrero";
            break;
        case 3:
            $nombre = "Marzo";
            break;
        case 4:
            $nombre = "Abril";
            break;
        case 5:
            $nombre = "Mayo";
            break;
        case 6:
            $nombre = "Junio";
            break;
        case 7:
            $nombre = "Julio";
            break;
        case 8:
            $nombre = "Agosto";
            break;
        case 9:
            $nombre = "Septiembre";
            break;
        case 10:
            $nombre = "Octubre";
            break;
        case 11:
            $nombre = "Noviembre";
            break;
        case 12:
            $nombre = "Diciembre";
            break;
    }
    return $nombre;
}

function tipoTrabajo($tipoTrabajo){
    $nombre = "";
    switch ($tipoTrabajo) {
        case 1:
            $nombre = "Tesis de Grado";
            break;
        case 2:
            $nombre = "Tesis de Postgrado";
            break;
        case 3:
            $nombre = "Maestria";
            break;
        case 4:
            $nombre = "Investigacion Docente";
            break;
        case 5:
            $nombre = "Investigacion Institucional";
            break;
    }
    return $nombre;
}

function estado($estado){
    $nombre = "";
    switch ($estado){
        case 1:
            $nombre = "Pendiente";
            break;
        case 2:
            $nombre = "Aprobado";
            break;
        case 3:
            $nombre = "Con observaciones";
            break;
        case 4:
            $nombre = "Rechazado";
            break;
    }
    return $nombre;
}
function colorCelda($estado){
    $nombre = "";
    switch ($estado){
        case 1: //revision
            $nombre = "revision";
            break;
        case 2: //aprobado
            $nombre = "aprobado";
            break;
        case 3: //observaciones
            $nombre = "devuelto";
            break;
        case 4: //rechazado
            $nombre = "rechazado";
            break;
    }
    return $nombre;
}

function obtenerDiaConHora(){
    date_default_timezone_set("America/El_Salvador");
    return date('Y-m-d h:i:s');
}

function formatearFecha($fecha){
    if($fecha){
        return date('d/m/Y', strtotime($fecha));
    }

    return "N/A";
}