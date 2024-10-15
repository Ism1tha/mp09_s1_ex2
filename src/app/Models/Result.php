<?php

namespace App\Models;

class Result {

    private $type;
    private $result;
    private $expression;

    public function __construct($type, $result, $expression) {
        $this->type = $type;
        $this->result = $result;
        $this->expression = $expression;
    }

    /* Getters */
    
    public function getType() {
        return $this->type;
    }

    public function getResult() {
        return $this->result;
    }

    public function getExpression() {
        return $this->expression;
    }

}