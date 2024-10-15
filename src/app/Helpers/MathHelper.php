<?php

namespace App\Helpers;

class MathHelper {

    /* Mètode per calcular una expressió */
    public static function calculateExpression($expression) {
        if(!self::checkExpressionIsValid($expression)) throw new \Exception('No numbers in the expression.');
        preg_match_all('/\d+!/', $expression, $matches);
        if(count($matches[0]) > 0) {
            foreach($matches[0] as $match) {
                $factorial_number = str_replace('!', '', $match);
                if($_ENV['CALCULATOR_NUMERIC_FACTORIAL_METHOD'] == 1) {
                    $factorial_result = self::calculateFactorialRecursive($factorial_number);
                } else {
                    $factorial_result = self::calculateFactorialIterative($factorial_number);
                }
                $expression = str_replace($factorial_number . '!', $factorial_result, $expression);
            }
        }
        return math_eval($expression);
    }

    /* Mètode per comprovar si una expressió és vàlida */
    public static function checkExpressionIsValid($expression) {
        $operators = ['+', '-', '*', '/', '!', '(', ')', '^', '.'];
        $expression = str_replace(' ', '', $expression);
        $expression = str_replace($operators, '', $expression);
        return ctype_digit($expression);
    }

    /* Mètode per calcular el factorial d'un número de forma iterativa */
    public static function calculateFactorialIterative($number) {
        for($i = $number - 1; $i > 0; $i--) {
            $number *= $i;
        }
        return $number;
    }

    /* Mètode per calcular el factorial d'un número de forma recursiva */
    public static function calculateFactorialRecursive($number) {
        if($number == 0) {
            return 1;
        }
        return $number * self::calculateFactorialRecursive($number - 1);
    }

}