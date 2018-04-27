<?php
declare(strict_types=1);

namespace App\Tests;

use App\Model\Calculator;
use App\Model\Operators\Arithmetical\Add;
use App\Model\Operators\Bitwise\BitwiseAnd;
use App\Model\Operators\Bitwise\BitwiseOr;
use App\Model\Operators\Arithmetical\Divide;
use App\Model\Operators\Arithmetical\Multiply;
use App\Model\Operators\Arithmetical\Subtract;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{

    /**
     * @var Calculator
     */
    private $calculate;

    public function setUp()
    {
        parent::setUp();
        $this->calculate = new Calculator(100);
    }

    /**
     * @test
     */
    public function test_can_create_calculator()
    {
        $this->assertInstanceOf(Calculator::class, $this->calculate);
    }

    /**
     * @test
     */
    public function test_can_add_values()
    {
        $operator = new Add(1);
        $results  = $this->calculate->useOperator($operator)->calculate();

        $this->assertEquals(101, $results->value());
    }

    /**
     * @test
     */
    public function test_can_subtract_values()
    {
        $operator = new Subtract(5);
        $results  = $this->calculate->useOperator($operator)->calculate();

        $this->assertEquals(95, $results->value());
    }

    /**
     * @test
     */
    public function test_can_multiple_values()
    {
        $operator = new Multiply(5);
        $results  = $this->calculate->useOperator($operator)->calculate();
        $this->assertEquals(500, $results->value());
    }

    /**
     * @test
     */
    public function test_can_divide_values()
    {
        $operator = new Divide(10);
        $results  = $this->calculate->useOperator($operator)->calculate();
        $this->assertEquals(10, $results->value());
    }

    /**
     * @test
     */
    public function test_can_bitwise_and()
    {
        $operator = new BitwiseAnd(13);
        $results  = $this->calculate->useOperator($operator)->calculate();
        $this->assertEquals(4, $results->value());
    }

    /**
     * @test
     */
    public function test_can_bitwise_or()
    {
        $operator = new BitwiseOr(13);
        $results  = $this->calculate->useOperator($operator)->calculate();
        $this->assertEquals(109, $results->value());
    }

}
