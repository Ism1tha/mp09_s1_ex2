<?php

namespace App\Controllers;

use App\Core\View;

class ErrorController {

    /* Mètode per mostrar la vista d'error 404 */
    public function notFound($path) {
        View::render('Error 404', 'MainLayout',  'ErrorView', [
            'errorCode' => 404,
            'errorMessage' => 'Page not found (' . $path . ')',
        ]);
    }

    /* Mètode per mostrar la vista d'error 500 */
    public function internalError() {
        View::render('Error 500', 'MainLayout',  'ErrorView', [
            'errorCode' => 500,
            'errorMessage' => 'Internal server error'
        ]);
    }

    /* Mètode per mostrar la vista d'error 405 */
    public function invalidMethod($allowedMethods) {
        View::render('Error 405', 'MainLayout',  'ErrorView', [
            'errorCode' => 405,
            'errorMessage' => 'Invalid method. Allowed methods: ' . implode(', ', $allowedMethods)
        ]);
    }
}