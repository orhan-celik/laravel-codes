<?php

use Carbon\Carbon;

/**
 * @param int $period
 * @return array
 */
function weekParts($period = 2){
    $weekParts = [];
    $now = Carbon::now()->timezone('Europe/Istanbul');
    $currentWeekFirstDay = $now->startOfWeek()->format('Y-m-d H:i:s');
    $weekPeriod = $period;
    for($i = $weekPeriod * -1; $i<=$weekPeriod; $i++){
        $firstDayOfWeek = Carbon::parse($currentWeekFirstDay)->addWeeks($i)->format('Y-m-d H:i:s');
        $weekParts[$i] = [
            "start" => $firstDayOfWeek,
            "end"   => Carbon::parse($firstDayOfWeek)->endOfWeek()->format('Y-m-d H:i:s'),
            "title" => $i == 0 ? 'Bu hafta' : (($i < 0) ? $i * -1 : $i).' hafta '.($i > 0 ? 'sonra' : 'önce')
        ];
    }
    return $weekParts;
}
// Using  = weekParts(2);

/**
 * @param string $date
 * @return array
 */

function monthParts($period = 2){
    $weekParts = [];
    $now = Carbon::now()->timezone('Europe/Istanbul');
    $currentMonthFirstDay = $now->startOfMonth()->format('Y-m-d H:i:s');
    $weekPeriod = $period;
    for($i = $weekPeriod * -1; $i<=$weekPeriod; $i++){
        $firstDayOfWeek = Carbon::parse($currentMonthFirstDay)->addMonth($i)->format('Y-m-d H:i:s');
        $weekParts[$i] = [
            "start" => $firstDayOfWeek,
            "end"   => Carbon::parse($firstDayOfWeek)->endOfMonth()->format('Y-m-d H:i:s'),
            "title" => $i == 0 ? 'Bu ay' : (($i < 0) ? $i * -1 : $i).' ay '.($i > 0 ? 'sonra' : 'önce')
        ];
    }
    return $weekParts;
}
// Using  = monthParts(2);
