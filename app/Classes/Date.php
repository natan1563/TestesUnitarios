<?php 

namespace App\Classes;

use Exception;

class Date 
{
    private $date;

    public function __construct($date) 
    {
        $date        = str_replace('-', '/', $date); 
        $this->date  = explode('/', $date);
    }

    public function validateFormatDate() {
        return count($this->date);
    }

    public function validateYearBisexto() 
    {
        $amountCharYear = strlen($this->date[2]);

        return ($amountCharYear < 1 || $amountCharYear > 4);
    }

    // public function dayAndMonthValidate($date)
    // {        
    //     $bissexto    = (cal_days_in_month(CAL_GREGORIAN, 2, $dates[2]) == 29) ? 29 : 28;
    //     $mapMonthDay = [
    //         "01" => 31,
    //         "02" => $bissexto,
    //         "03" => 31,
    //         "04" => 30,
    //         "05" => 31,
    //         "06" => 30,
    //         "07" => 31,
    //         "08" => 31,
    //         "09" => 30,
    //         "10" => 31,
    //         "11" => 30,
    //         "12" => 31
    //     ];

    //     if (!in_array($dates[1], array_keys($mapMonthDay))) return false;

    //     return ($dates[0] <= $mapMonthDay[$dates[1]]);
    // }

    public function daysOfFebruaryHasTwentyEightDays() 
    {
        return (cal_days_in_month(CAL_GREGORIAN, 2, $this->date[2]) == 28);
    }
}