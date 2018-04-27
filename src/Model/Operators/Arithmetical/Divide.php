<?php
declare(strict_types=1);

namespace App\Model\Operators\Arithmetical;

use App\Model\Operators\Operator;
use App\Model\Operators\OperatorBase;

class Divide extends OperatorBase implements Operator
{

    /**
     * @param float $value
     * @return float
     */
    public function process(float $value): float
    {
        return $value / $this->value;
    }
}
