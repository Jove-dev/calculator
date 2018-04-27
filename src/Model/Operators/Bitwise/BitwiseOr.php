<?php
declare(strict_types=1);

namespace App\Model\Operators\Bitwise;

use App\Model\Operators\Operator;
use App\Model\Operators\OperatorBase;

class BitwiseOr extends OperatorBase implements Operator
{

    /**
     * @param float $value
     * @return float
     */
    public function process(float $value): float
    {
        return $this->value | $value;
    }
}
