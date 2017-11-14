<?php
defined('_JEXEC') or die('Acceso restringido');

class Paginacion{

    /**
     * Paginacion constructor.
     * @param $resultados_por_pagina - a mostrar
     * @param $pagina_actual
     * @param $resultados - cantidad de resultados
     */
    function __construct($resultados_por_pagina,$pagina_actual,$resultados)
    {
        $this->RESULTADOS_POR_PAGINA = $resultados_por_pagina;
        $this->PAGINA_ACTUAL = $pagina_actual;
        $this->CANTIDAD_DE_RESULTADOS = $resultados;
        $this->TOTAL_DE_PAGINAS = ceil($this->CANTIDAD_DE_RESULTADOS / $this->RESULTADOS_POR_PAGINA);
        $this->MOSTRAR_DESDE = ($this->PAGINA_ACTUAL - 1) * $this->RESULTADOS_POR_PAGINA;
    }

}

