<?php
declare(strict_types=1);

namespace App\Model\Operators;

abstract class OperatorBase
{

    /**
     * @var float
     */
    protected $value;

    /**
     * @param float $value
     */
    public function __construct(float $value)
    {
        $this->value = $value;
    }

    /**
     * @param float $value
     * @return float
     */
    abstract public function process(float $value): float;
}
