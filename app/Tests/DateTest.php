<?php

namespace App\Tests;

use App\Classes\Date;
use Exception;
use PHPUnit\Framework\TestCase;

class DateTest extends TestCase
{
    
    // /**
    //  * @dataProvider dateProvider
    //  */
    // public function testShouldDateValid($date, $expected)
    // {   

    //     $actual = (!strlen($date)) ? false : $this->dayAndMonthValidate($date);
        
    //     $this->assertEquals($expected, $actual);
    // }

    /**
     * @dataProvider dateSlashProvider
     */
    public function testShouldHasTwoSlashes($date, $expected) 
    {
        $date = new Date($date);
        $this->assertEquals($expected, $date->validateFormatDate());
    }
    /**
     * @dataProvider dateCountChars
     */
    public function testShouldHasTenDigits($date)
    {
        $this->assertEquals(10, strlen($date));
    }

    /**
     * @dataProvider daysOfFebruary
     */
    public function testDaysOfFebruaryShouldHasTwentyEightDays($date) 
    {
        $date = new Date($date);
        $this->assertEquals(true, $date->daysOfFebruaryHasTwentyEightDays());
    }
 

    // public function dateProvider() {
    //     return [
    //         ['date' => '25/02/2001', "expected" => true],
    //         ['date' => '23/02/2002', "expected" => true],
    //         ['date' => '29/07/19999',"expected" => false],
    //         ['date' => '',           "expected" => false],
    //         ['date' => '29/02/2000',"expected"  => true],
    //         ['date' => '29-01/2000',"expected"  => true],
    //         ['date' => '29-01-2000',"expected"  => true],
    //         ['date' => '29.01.2000',"expected"  => false],
    //         ['date' => '29\\01\\2000',"expected"=> false],
    //         ['date' => '00/01/2002',"expected"  => true],
    //         ['date' => '00/',"expected"         => false],
    //         ['date' => '// // //',"expected"    => false],
    //     ];
    // }

    
    public function dateCountChars() {
        return [
            ['date' => '25/02/2001'],
            ['date' => '23/02/2002'],
            ['date' => '29/07/1999'],
            ['date' => '29-02-2000'],
            ['date' => '29-01/2000'],
            ['date' => '29-01-2000'],
            ['date' => '29.01.2000'],
            ['date' => '00/01/2002'],
        ];
    }

    public function daysOfFebruary() {
        return [
            ['date' => '25/02/2001'],
            ['date' => '23/02/2002'],
            ['date' => '29-02-2003'],
            ['date' => '29-01/2009'],
            ['date' => '29-01-2005'],
            ['date' => '29-01-2001'],
            ['date' => '00/01/2002'],
        ];
    }
    
    public function dateSlashProvider() {
        return [
            ['date' => '25/02/2001', "expected" => 3],
            ['date' => '23/02/2002', "expected" => 3],
            ['date' => '29/07.19999',"expected" => 2],
            ['date' => '',           "expected" => 1],
            ['date' => '29-02-2000', "expected"  => 3],
            ['date' => '29-01/2000', "expected"  => 3],
            ['date' => '29-01-2000', "expected"  => 3],
            ['date' => '29.01.2000', "expected"  => 1],
            ['date' => '29\\01\\2000', "expected"=> 1],
            ['date' => '00/01/2002', "expected"  => 3],
            ['date' => '00/', "expected"         => 2],
            ['date' => '/ / /', "expected"       => 4],
        ];
    }
}
