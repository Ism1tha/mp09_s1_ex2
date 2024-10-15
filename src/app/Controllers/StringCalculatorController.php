<?php

namespace App\Controllers;

use App\Core\View;
use App\Core\Session;
use App\Models\Result;

use App\Helpers\StringHelper;

class StringCalculatorController {

    /* Mètode per retornar la vista de la calculadora */
    public function index($request) {    
        View::render('Calculadora de strings', 'MainLayout', 'StringCalculatorView', [
            'request' => $request
        ], '/');
    }

    /* Mètode per calcular la operació de la calculadora */
    public function calculate($request) {
        /* Preparem la cadena te text per enmagatzemar l'expression a la sessió */
        if($request['request_data']['operation'] == 'concat') {
            $result_str = StringHelper::concat($request['request_data']['string'], $request['request_data']['string2']);
        } else {
            $result_str = StringHelper::removeString($request['request_data']['string'], $request['request_data']['string2']);
        }

        /* Guardar l'operació a la sessió */
        if($request['request_data']['operation'] == 'concat') {
            $expression = $request['request_data']['string'] . ' + ' . $request['request_data']['string2'];
        } else {
            $expression = $request['request_data']['string'] . ' - ' . $request['request_data']['string2'];
        }

        $result = new Result(2, $result_str, $expression);

        Session::add('history', $result);

        /* Renderitzar la vista de la calculadora amb el resultat */
        View::render('Calculadora de strings', 'MainLayout',  'StringCalculatorView', [
            'request' => $request,
            'result'  => $result
        ], '/');
    }
}