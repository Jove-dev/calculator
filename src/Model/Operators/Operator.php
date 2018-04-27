<?php
declare(strict_types=1);

namespace App\Model\Operators;

interface Operator
{
    CONST ADD      = 'Add';
    CONST SUBTRACT = 'Subtract';
    CONST DIVIDE   = 'Divide';
    CONST MULTIPLY = 'Multiply';
    CONST OR       = 'BitwiseAnd';
    CONST AND      = 'BitwiseOr';

    /**
     * @param float $value
     * @return float
     */
    public function process(float $value): float;
}
