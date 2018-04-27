<?php
declare(strict_types=1);

namespace App\Model;

use App\Model\Operators\Operator;

class Calculator
{

    /**
     * @var float
     */
    protected $value;

    /**
     * @var Operator
     */
    protected $operator;

    /**
     * @param float $value
     */
    public function __construct(float $value)
    {
        $this->value = $value;
    }

    /**
     * @param Operator $operator
     * @return Calculator
     */
    public function useOperator(Operator $operator): Calculator
    {
        $this->operator = $operator;

        return $this;
    }

    /**
     * @return Calculator
     */
    public function calculate(): Calculator
    {
        $this->value = $this->operator->process($this->value);

        return $this;
    }

    /**
     * @return float
     */
    public function value(): float
    {
        return $this->value;
    }

}
