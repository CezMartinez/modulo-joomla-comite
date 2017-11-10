<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Nombre Trabajo</th>
            <th>Nombre Investigador</th>
            <th>Año</th>
            <th>Mes</th>
            <th>Numero de registro</th>
            <th>Tipo de trabajo</th>
            <th>Fecha de revision</th>
        </tr>
        </thead>
        <tbody>
        <?php if($solicitud->contarSolicitudes() > 0 ) : ?>
            <?php foreach ($solicitud->obtenerSolicitudes($paginacion->RESULTADOS_POR_PAGINA,$paginacion->MOSTRAR_DESDE) as $solicitud) : ?>
                <tr>
                    <td><?php echo $solicitud['nombre_trabajo']?></td>
                    <td><?php echo $solicitud['nombre_investigador']?></td>
                    <td><?php echo $solicitud['anio']?></td>
                    <td><?php echo $solicitud['mes']?></td>
                    <td><?php echo $solicitud['numero_registro']?></td>
                    <td><?php echo $solicitud['tipo_trabajo']?></td>
                    <td><?php echo $solicitud['fecha_revision']?></td>
                </tr>
            <?php endforeach;?>
        <?php else: ?>
            <tr>
                <td colspan="8" style="text-align: center"><?php echo "no hay resultados"?></td>
            </tr>
        <?php endif;?>
        </tbody>
    </table>
</div>

<div class="c-pagination">
    <?php  for ($i = 1; $i <= $paginacion->TOTAL_DE_PAGINAS; $i++) :?>
        <a href="?pagina=<? echo $i?>" class="<?php echo ($paginacion->PAGINA_ACTUAL == $i) ?  'active' :  ''?>">
            <?php echo $i ?>
        </a>
    <?php endfor; ?>
</div>
<p>
    Total de solicitudes  <?php echo $paginacion->CANTIDAD_DE_RESULTADOS ?> <br>
    Pagina <?php echo $paginacion->PAGINA_ACTUAL ?>  de <?php echo $paginacion->TOTAL_DE_PAGINAS ?>
</p>
