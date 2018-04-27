<?php

namespace App\Services;

use App\Model\Calculator;
use App\Model\Operators\Arithmetical\Add;
use App\Model\Operators\Arithmetical\Divide;
use App\Model\Operators\Arithmetical\Multiply;
use App\Model\Operators\Arithmetical\Subtract;
use App\Model\Operators\Bitwise\BitwiseAnd;
use App\Model\Operators\Bitwise\BitwiseOr;
use App\Model\Operators\Operator;
use Symfony\Component\Form\FormInterface;

class CalculatorFormHandler
{

    /**
     * @var Calculator
     */
    private $calculator;

    /**
     * @param FormInterface $form
     * @return float
     */
    public function result(FormInterface $form)
    {

        $operator = $form->get('operator')->getData();
        $value1   = $form->get('number1')->getData();
        $value2   = $form->get('number2')->getData();

        $this->calculator = new Calculator($value1);

        return $this->chooseOperatorForValue($operator, $value2);
    }

    /**
     * @param string $operator
     * @param float  $value2
     * @return float
     */
    private function chooseOperatorForValue(string $operator, float $value2)
    {

        switch ($operator) {
            case Operator::ADD:
                return $this->add($value2);
            case Operator::SUBTRACT:
                return $this->subtract($value2);
            case Operator::DIVIDE:
                return $this->divide($value2);
            case Operator::MULTIPLY:
                return $this->multipy($value2);
            case Operator:: OR:
                return $this->bitwiseOr($value2);
            case Operator:: AND:
                return $this->bitwiseAnd($value2);
            default:
                return 0;
        }
    }

    /**
     * @param float $value
     * @return float
     */
    private function add(float $value): float
    {
        return $this->calculator->useOperator(new Add($value))->calculate()->value();
    }

    /**
     * @param float $value
     * @return float
     */
    private function subtract(float $value): float
    {
        return $this->calculator->useOperator(new Subtract($value))->calculate()->value();
    }

    /**
     * @param float $value
     * @return float
     */
    private function divide(float $value): float
    {
        return $this->calculator->useOperator(new Divide($value))->calculate()->value();
    }

    /**
     * @param float $value
     * @return float
     */
    private function multipy(float $value): float
    {
        return $this->calculator->useOperator(new Multiply($value))->calculate()->value();
    }

    /**
     * @param float $value
     * @return float
     */
    private function bitwiseOr(float $value): float
    {
        return $this->calculator->useOperator(new BitwiseOr($value))->calculate()->value();
    }

    /**
     * @param float $value
     * @return float
     */
    private function bitwiseAnd(float $value): float
    {
        return $this->calculator->useOperator(new BitwiseAnd($value))->calculate()->value();
    }

}
