<?php

namespace App\Tests;

use App\Classes\Date;
use Exception;
use PHPUnit\Framework\TestCase;

class DateTest extends TestCase
{
    
    /**
     * @dataProvider dateProvider
     */
    public function testShouldDateValid($date, $expected)
    {      
        $actual = (!strlen($date)) ? false : $this->dayAndMonthValidate($date);
        
        $this->assertEquals($expected, $actual);
    }

    public function dayAndMonthValidate($date)
    {
        $date        = str_replace('-', '/', $date); 
        $dates       = explode('/', $date);
        
        if (count($dates) != 3) return false;
        
        $bissexto    = (cal_days_in_month(CAL_GREGORIAN, 2, $dates[2]) == 29) ? 29 : 28;
        $amountCharYear = strlen($dates[2]);

        if ($amountCharYear < 1 || $amountCharYear > 4) return false;
        
        $mapMonthDay = [
            "01" => 31,
            "02" => $bissexto,
            "03" => 31,
            "04" => 30,
            "05" => 31,
            "06" => 30,
            "07" => 31,
            "08" => 31,
            "09" => 30,
            "10" => 31,
            "11" => 30,
            "12" => 31
        ];

        if (!in_array($dates[1], array_keys($mapMonthDay))) return false;

        return ($dates[0] <= $mapMonthDay[$dates[1]]);
    }

    public function dateProvider() {
        return [
            ['date' => '25/02/2001', "expected" => true],
            ['date' => '23/02/2002', "expected" => true],
            ['date' => '29/07/19999',"expected" => false],
            ['date' => '',           "expected" => false],
            ['date' => '29/02/2000',"expected"  => true],
            ['date' => '29-01/2000',"expected"  => true],
            ['date' => '29-01-2000',"expected"  => true],
            ['date' => '29.01.2000',"expected"  => false],
            ['date' => '29\\01\\2000',"expected"=> false],
            ['date' => '00/01/2002',"expected"  => true],
            ['date' => '00/',"expected"         => false],
            ['date' => '// // //',"expected"    => false],
        ];
    }
}
