<?php

namespace App\Core;

use App\Controllers\ErrorController;

class Router
{

    /* Array on guardarem les rutes (Ruta, Controlador, Acció) */
    public $routes = [];

    /* Mètode per afegir rutes al nostre sistema */
    public function add($path, $controller, $action, $method = 'GET', $return_path = null) {
        $this->routes[$method][$path] = [
            'controller' => $controller,
            'action' => $action,
            'method' => $method,
            'return_path' => $return_path
        ];
    }

    /* Mètode per processar una ruta */
    public function dispatch($path, $requestMethod, $requestData) {
        /* Si existeix la ruta per al request method i ruta */
        if(array_key_exists($path, $this->routes[$requestMethod])) {
            /* Preparem les dades de la petició per a ser enviades al controlador */
            $request = [
                'request_method' => $requestMethod,
                'request_data' => $requestData,
            ];
            /* Instanciem el controlador i cridem a l'acció */
            $routeController = $this->routes[$requestMethod][$path]['controller'];
            $routeAction = $this->routes[$requestMethod][$path]['action'];
            $controller = new $routeController();
            $controller->{$routeAction}($request);
        }
        /* Si no, verifiquem si es mètode invàlid o si es 404. */
        else {
            $otherMethods = $this->checkOtherMethods($path);
            if(count($otherMethods) > 0) // Retornem error 405, del contrari retornem error 404
            {
                $errorController = new ErrorController();
                $errorController->invalidMethod($otherMethods);
            }
            else {
                $errorController = new ErrorController();
                $errorController->notFound($path);
            }
        }
    }

    /* Mètode per obtenir els tipus de mètodes que accepta una ruta */
    private function checkOtherMethods($path){
        /* Verifiquem per als actuals mètodes disponibles (GET, POST, DELETE) a quins existeix la ruta i retornem */
        $methods_available = [];
        foreach($this->routes as $key => $route) {
            if(array_key_exists($path, $this->routes[$key])) {
                $methods_available[] = $key;
            }
        }
        return $methods_available; 
    }
}