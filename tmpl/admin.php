<?php
    defined('_JEXEC') or die('Acceso restringido <br/> Buen intento!');
?>
<div class="modulo_comite">
    <div class="grid">


        <?php  if(!$mostrar_editar && !$mostrar_eliminar) : ?>

            <div class="box-buttons">
                <a data-fancybox data-src="#hidden-content-b" href="javascript:;" class="c-btn c-btn-primary">Agregar Solicitud</a>
                <button class="c-btn c-btn-danger" id="mostrar_eliminar">Eliminar</button>
            </div>

            <?php
                require_once ('helper/estado.php');
                require_once('formularios/formulario_crear.php'); //trae el formulario para crear solicitudes, pero esta oculto
                require_once('formularios/formulario_eliminar.php'); //hace que se muestre la tabla de resultados
                require_once ('tabla_resultados.php');
            ?>
        <?php endif; ?>

        <?php
        if($mostrar_editar){
            $solicitud_a_editar = $solicitud->obtenerSolicitud($id_solicitud);
            require_once('formularios/formulario_editar.php'); //hace que se muestre la tabla de resultados
        }
        ?>
    </div>
</div>



