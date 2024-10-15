<?php

namespace App\Core;

class View {

    /* Mètode per renderitzar una vista */
    public static function render($title, $layout, $viewName, $data = [], $return_path = null) {
        extract($data);
        ob_start();
        require __DIR__ . '/../Views/' . $viewName . '.php';
        $content = ob_get_clean();
        require __DIR__ . '/../Layouts/' . $layout . '.php';
    }
    
}