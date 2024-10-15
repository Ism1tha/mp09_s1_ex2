<?php

namespace App\Helpers;

class StringHelper {

    /* Mètode per concatenar dos strings */
    public static function concat($string1, $string2) {
        return $string1 . $string2;
    }

    /* Mètode per eliminar una cadena de text d'una altra */
    public static function removeString($string, $remove) {
        return str_replace($remove, '', $string);
    }
}