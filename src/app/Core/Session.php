<?php

namespace App\Core;

class Session {

    /* Mètode per iniciar la sessió */
    public static function start() {
        session_start();
    }

    /* Mètode per afegir un element a la sessió */
    public static function add($key, $value) {
        $_SESSION[$key][] = $value;
    }

    /* Mètode per obtenir un element de la sessió */
    public static function get($key) {
        if (!isset($_SESSION[$key])) {
            return null;
        }
        return $_SESSION[$key];
    }

    /* Mètode per esborrar un element de la sessió */
    public static function destroy() {
        session_destroy();
    }

    /* Mètode per comprovar si un element existeix a la sessió */
    public static function exists($key) {
        return isset($_SESSION[$key]);
    }
    
}