<div class="table-responsive">
    <table class="table table-bordered ">
        <thead>
        <tr>
            <th>Trabajo</th>
            <th>Investigador</th>
            <th>Año</th>
            <th>Mes</th>
            <th>Registro</th>
            <th>Tipo </th>
            <th>Fecha de revision</th>
            <th>Fecha de aprobacion</th>
            <th>Fecha de devuelto</th>
            <th>Fecha de rechazado</th>
            <?php if (!$usuario->guest || autenticarUsuario($usuario->groups)) : ?>
                <th>Acciones</th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php if($solicitud->contarSolicitudes() > 0 ) : ?>
            <?php foreach ($solicitud->obtenerSolicitudes($paginacion->RESULTADOS_POR_PAGINA,$paginacion->MOSTRAR_DESDE) as $solicitude) : ?>
                <tr class="<?php echo colorCelda($solicitude['estado'])?>">
                    <td><?php echo $solicitude['nombre_trabajo']?></td>
                    <td><?php echo $solicitude['nombre_investigador']?></td>
                    <td><?php echo $solicitude['anio']?></td>
                    <td><?php echo mes($solicitude['mes'])?></td>
                    <td><?php echo $solicitude['numero_registro']?></td>
                    <td><?php echo tipoTrabajo($solicitude['tipo_trabajo'])?></td>
                    <td><?php echo formatearFecha($solicitude['fecha_revision'])?></td>
                    <td><?php echo formatearFecha($solicitude['fecha_aprovado'])?></td>
                    <td><?php echo formatearFecha($solicitude['fecha_devuelto'])?></td>
                    <td><?php echo formatearFecha($solicitude['fecha_rechazado'])?></td>
                    <?php if (!$usuario->guest || autenticarUsuario($usuario->groups)) : ?>
                        <td>
                            <a href="?editar=true&id_solicitud=<?php echo $solicitude['id_solicitud']?>" class="c-btn c-btn-primary">
                                <span>Editar</span>
                            </a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach;?>
        <?php else: ?>
            <tr>
                <td colspan="11" style="text-align: center"><?php echo "no hay resultados"?></td>
            </tr>
        <?php endif;?>
        </tbody>
    </table>
</div>

<?php if ($solicitud->contarSolicitudes() > 0) : ?>
    <div class="c-pagination">
        <?php  for ($i = 1; $i <= $paginacion->TOTAL_DE_PAGINAS; $i++) :?>
            <a href="?pagina=<? echo $i?>" class="<?php echo ($paginacion->PAGINA_ACTUAL == $i) ?  'active' :  ''?>">
                <?php echo $i ?>
            </a>
        <?php endfor; ?>
    </div>
    <p>
        Total de solicitudes  <strong><?php echo $paginacion->CANTIDAD_DE_RESULTADOS ?></strong> <br>
        Pagina <strong><?php echo $paginacion->PAGINA_ACTUAL ?></strong>  de <strong><?php echo $paginacion->TOTAL_DE_PAGINAS ?></strong>
    </p>
<?php endif;?>
