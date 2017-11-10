<?php
    defined('_JEXEC') or die('Acceso restringido <br/> Buen intento!');

?>

<div class="grid">

    <p>
        <a data-fancybox data-src="#hidden-content-b" href="javascript:;" class="btn btn-primary">Agregar Solicitud</a>
    </p>

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
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                </fieldset>
                <fieldset>
                    <label for="tipo_trabajo">Tipo de trabajo</label>
                    <select  id="tipo_trabajo" name="tipo_trabajo" required>
                        <option value="" disabled selected>Seleccione el tipo de trabajo</option>
                        <option value="1">Tesis de Grado</option>
                        <option value="2">Tesis de Postgrado</option>
                        <option value="3">Maestria</option>
                        <option value="4">Investigacion Docente</option>
                        <option value="5">Investigacion Institucional</option>
                    </select>
                </fieldset>
                <fieldset>
                    <label for="estado">Estado del trabajo</label>
                    <select  id="estado" name="estado" required>
                        <option value="" disabled>Selecciones el estado del trabajo</option>
                        <option value="1" selected>Pendiente</option>
                        <option value="2">Aprovado</option>
                        <option value="3">Con observaciones</option>
                        <option value="4">Rechazado</option>
                    </select>
                </fieldset>

                <button class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>

</div>

<?php
    require_once ('tabla_resultados.php') //hace que se muestre la tabla de resultados
?>
