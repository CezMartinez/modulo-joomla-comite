<form action="/" method="POST" id="formulario_eliminar" class="animated">
    <fieldset>
        <label for="id_solicitud_eliminar">Seleccione la Solicitud a eliminar</label>
        <select name="id_solicitud" id="solicitud_eliminar">
            <?php foreach ($solicitud->obtenerSolicitudesII() as $solicitude) : ?>
                <option value="<?php echo $solicitude['id_solicitud'] ?>" >
                    <?php echo $solicitude['nombre_trabajo']?>
                </option>
            <?php endforeach; ?>
        </select>
        <button class="c-btn c-btn-danger">Eliminar</button>
    </fieldset>
</form>



