<?php 

namespace App\Classes;

use Exception;

class Math 
{
    public function calculate($operator, $number1, $number2) 
    {
        switch($operator) {
            case '+': 
                return $this->sum($number1, $number2);
            
            case '-': 
                return $this->subtract($number1, $number2);
            case '/': 
                return $this->divider($number1, $number2);
        }
    }

    public function sum($number1, $number2)
    {
        return ($number1 + $number2);
    } 
    
    public function subtract($number1, $number2)
    {
        return ($number1 - $number2);
    }

    public function divider($number1, $number2)
    {
        if ($number2 === 0) throw new Exception("Náo e possivel dividir um numero por zero");

        return ($number1 / $number2);
    }
}