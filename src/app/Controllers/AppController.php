<?php

namespace App\Controllers;

use App\Core\View;
use App\Core\Session;

class AppController {

    /* Mètode per retornar la vista del dashboard */
    function index() {
        View::render('Dashboard', 'MainLayout', 'HomeView');
    }

    /* Mètode per retornar la vista de la calculadora de strings */
    function destroySession() {
        Session::destroy();
        header('Location: /#session-destroyed');
    }
    
}