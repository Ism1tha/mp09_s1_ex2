<?php

namespace App\Controllers;

use App\Core\View;
use App\Core\Session;
use App\Models\Result;

use App\Helpers\MathHelper;

class NumericCalculatorController {

    /* Mètode per retornar la vista de la calculadora */
    public function index($request) {    
        View::render('Calculadora numérica', 'MainLayout',  'NumericCalculatorView', [
            'request' => $request,
        ], '/');
    }

    /* Mètode per calcular una expressió enviada desde l'aplicació */
    public function calculate($request) {

        /* Evaluar l'expressió i guardar el resultat a la sessió */
        try {
            $result = new Result(
                1,
                MathHelper::calculateExpression($request['request_data']['expression']),
                $request['request_data']['expression']
            );
        } catch (\Exception $e) {
            $result = new Result(
                1,
                'Expressión inválida',
                $request['request_data']['expression']
            );
        }

        Session::add('history', $result);

        /* Renderitzar la vista de la calculadora amb el resultat */
        View::render('Calculadora numérica', 'MainLayout',  'NumericCalculatorView', [
            'request' => $request,
            'result'  => $result,
        ],
        '/');
    }
    
}