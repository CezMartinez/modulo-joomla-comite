<div id="hidden-content-b" style="display: none; width: 75%">
    <div class="_formulario">
        <form action="./" method="POST" name="formulario-de-solicitudes">
            <fieldset>
                <label for="nombre_investigador">Nombre del trabajador</label>
                <input type="text" id="nombre_investigador" name="nombre_investigador" placeholder="Ingrese el nombre del investigador" required>
            </fieldset>
            <fieldset>
                <label for="nombre_trabajo">Nombre del trabajo</label>
                <input type="text" id="nombre_trabajo" name="nombre_trabajo" placeholder="Ingrese el nombre del trabajo" required>
            </fieldset>
            <fieldset>
                <label for="anio">Año de investigacion</label>
                <input type="number" min="2000" max="2099" value="2017" id="anio" step="1"
                       name="anio" placeholder="Ingrese el año del trabajo" required>
            </fieldset>
            <fieldset>
                <label for="mes">Mes de investigacion</label>
                <select  id="mes" name="mes" required>
                    <option value="" disabled selected>Seleccione el mes del trabajo</option>
                    <?php for($mes = 1; $mes <= 12; $mes++) : ?>
                        <option value="<?php echo $mes ?>" >
                            <?php echo mes($mes) ?>
                        </option>
                    <?php endfor;?>
                </select>
            </fieldset>
            <fieldset>
                <label for="tipo_trabajo">Tipo de trabajo</label>
                <select  id="tipo_trabajo" name="tipo_trabajo" required>
                    <option value="" disabled selected>Seleccione el tipo de trabajo</option>
                    <?php for($tipo = 1; $tipo <= 5; $tipo++) : ?>
                        <option value="<?php echo $tipo ?>" >
                            <?php echo tipoTrabajo($tipo) ?>
                        </option>
                    <?php endfor;?>
                </select>
            </fieldset>
            <fieldset>
                <label for="estado">Estado del trabajo</label>
                <select  id="estado" name="estado" required>
                    <option value="" disabled>Selecciones el estado del trabajo</option>
                    <option value="1" selected>Pendiente</option>
                </select>
            </fieldset>

            <button class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>

