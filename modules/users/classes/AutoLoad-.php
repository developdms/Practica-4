<?php

/**
 * Description of AutoLoad
 *
 * @author MARTIN
 */
class AutoLoad {

    static public function carga($clase) {
        $archivo = "../classes/" . str_replace('\\', '/', $clase) . '.php';
        if (file_exists($archivo)) {
            require $archivo;
        } else if (file_exists('../' . $archivo)) {
            require '../' . $archivo;
        } else if (file_exists('../../' . $archivo)) {
            require '../../' . $archivo;
        } else {
            $archivo = "classes/" . str_replace('\\', '/', $clase) . '.php';
            require $archivo;
        }
    }

}

spl_autoload_register('Autocarga::carga');
