<?php

class Sample_DateCalculator
{
    public function addDate($date_term)
    {
        $date1 = new Datetime();
        $date2 = new Datetime("$date_term");

        $date1->modify("+$date_term[8]$date_term[9] days");

        $week = array( "日", "月", "火", "水", "木", "金", "土" );
        $w = $week[$date1->format("w")];

        return $date1->format("n月d日")." {$w}曜日";
    }
}
