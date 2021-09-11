<?php 

namespace App\Tests;

use App\Classes\Math;
use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{
    /**
     * @dataProvider sumProvider
     */
    public function testShouldSumTwoNumbers($number1, $number2, $expected)
    {
        $math = new Math;
        $calculatedValue = $math->calculate("+", $number1, $number2);
 
        $this->assertEquals($expected, $calculatedValue);
    }

     /**
     * @dataProvider subtractProvider
     */
    public function testeShouldSubtractTwoNumbers($number1, $number2, $expected)
    {
        $math = new Math;
        $calculatedValue = $math->calculate("-", $number1, $number2);

        $this->assertEquals($expected, $calculatedValue);
    }

    /**
     * @dataProvider dividerProvider
     */
    public function testeShouldDivideTwoNumbers($number1, $number2, $expected)
    {
        $math = new Math;
        $calculatedValue = $math->calculate("/", $number1, $number2);

        $this->assertEquals($expected, $calculatedValue);
    }

    public function testShouldThrowAnExceptionWhenDivisionByZero() 
    {
       $this->expectException(\Exception::class);

        $math = new Math;
        $math->calculate("/", 10, 0);
    }

    public function sumProvider() {
        return [
            ['number1' => 5,  "number2" => 15, 'expected' => 20],
            ['number1' => 10, "number2" => 0,  'expected' => 10],
            ['number1' => -5, "number2" => 15, 'expected' => 10]
        ];
    }

    public function subtractProvider() {
        return [
            ['number1' => 5,  "number2" => 15, 'expected' => -10],
            ['number1' => 10, "number2" => 0,  'expected' => 10],
            ['number1' => -5, "number2" => 15, 'expected' => -20]
        ];
    }

    public function dividerProvider() {
        return [
            ['number1' => 10,  "number2" => 2, 'expected' => 5],
            ['number1' => 25, "number2" => 5,  'expected' => 5],
            ['number1' => -100, "number2" => 10, 'expected' => -10]
        ];
    }
}