<div class="grid" >

    <div class="c-jumbotron">
        <span>Formulario de edicion</span>
    </div>

    <div id="formulario_edicion">
        <div class="_formulario">
            <form action="./" method="POST" name="formulario-de-solicitudes">
                <fieldset>
                    <input type="hidden" id="id_solicitud" name="id_solicitud"
                           value="<? echo $solicitud_a_editar['id_solicitud'] ?>"
                           required>
                </fieldset>
                <fieldset>
                    <label for="n_nombre_investigador">Nombre del trabajador</label>
                    <input type="text" id="n_nombre_investigador" name="n_nombre_investigador"
                           placeholder="Ingrese el nombre del investigador"
                           value="<? echo $solicitud_a_editar['nombre_investigador'] ?>"
                           required>
                </fieldset>
                <fieldset>
                    <label for="n_nombre_trabajo">Nombre del trabajo</label>
                    <input type="text" id="n_nombre_trabajo" name="n_nombre_trabajo" placeholder="Ingrese el nombre del trabajo"
                           value="<? echo $solicitud_a_editar['nombre_trabajo'] ?>"
                           required>
                </fieldset>
                <fieldset>
                    <label for="n_anio">Año de investigacion</label>
                    <input type="number" min="2000" max="2099" id="n_anio" step="1"
                           value="<? echo $solicitud_a_editar['anio'] ?>"
                           name="n_anio" placeholder="Ingrese el año del trabajo" required>
                </fieldset>
                <fieldset>
                    <label for="n_mes">Mes de investigacion</label>
                    <select  id="n_mes" name="n_mes" required>
                        <option value="" disabled>Seleccione el mes del trabajo</option>
                        <?php for($mes = 1; $mes <= 12; $mes++) : ?>
                            <option value="<?php echo $mes ?>"
                                    <?php echo ($solicitud_a_editar['mes'] == $mes) ? 'selected' : ''?>
                            >
                                    <?php echo mes($mes) ?>
                            </option>
                        <?php endfor;?>
                    </select>
                </fieldset>
                <fieldset>
                    <label for="n_tipo_trabajo">Tipo de trabajo</label>
                    <select  id="n_tipo_trabajo" name="n_tipo_trabajo" required>
                        <option value="" disabled selected>Seleccione el tipo de trabajo</option>
                        <?php for($tipo = 1; $tipo <= 5; $tipo++) : ?>
                            <option value="<?php echo $tipo ?>"
                                <?php echo ($solicitud_a_editar['tipo_trabajo'] == $tipo) ? 'selected' : ''?>
                            >
                                <?php echo tipoTrabajo($tipo) ?>
                            </option>
                        <?php endfor;?>
                    </select>
                </fieldset>
                <fieldset>
                    <label for="n_estado">Estado del trabajo</label>
                    <select  id="n_estado" name="n_estado" required>
                        <option value="" disabled>Selecciones el estado del trabajo</option>
                        <?php for($estado = 1; $estado <= 5; $estado++) : ?>
                            <option value="<?php echo $estado ?>"
                                <?php echo ($solicitud_a_editar['estado'] == $estado) ? 'selected' : ''?>
                            >
                                <?php echo estado($estado) ?>
                            </option>
                        <?php endfor;?>
                    </select>
                </fieldset>

                <button class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>

</div>