<?php
function ArabicDate($date1) {

    $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
    $your_date = date('y-m-d h:i  a',strtotime($date1)); // The Current Date

    $en_month = date("M", strtotime($your_date));
    foreach ($months as $en => $ar) {
        if ($en == $en_month) { $ar_month = $ar; }
    }

    $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
    $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
    $ar_day_format = date('D',strtotime($your_date)); // The Current Day
    $ar_day = str_replace($find, $replace, $ar_day_format);

    $find1 = array ("am", "pm");
    $replace1 = array ("ص", "م");
    $ar_day_format1 = date('a',strtotime($date1)); // The Current Day
    $ar_day1 = str_replace($find1, $replace1, $ar_day_format1);

    header('Content-Type: text/html; charset=utf-8');
    $standard = array("0","1","2","3","4","5","6","7","8","9");
    $eastern_arabic_symbols = array("0","1","2","3","4","5","6","7","8","9");
    $current_date = date('h:i ',strtotime($your_date)) . $ar_day1 .' - ' .$ar_day.' '.date('d',strtotime($your_date)).' / '.$ar_month.' / '.date('Y',strtotime($your_date));
    $data = str_replace($standard , $eastern_arabic_symbols , $current_date);

    return $data;
}
function ArabicDate2($date1) {

    $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
    $your_date = date('y-m-d h:i  a',strtotime($date1)); // The Current Date

    $en_month = date("M", strtotime($your_date));
    foreach ($months as $en => $ar) {
        if ($en == $en_month) { $ar_month = $ar; }
    }
    $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
    $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
    $ar_day_format = date('D',strtotime($your_date)); // The Current Day
    $ar_day = str_replace($find, $replace, $ar_day_format);
    header('Content-Type: text/html; charset=utf-8');
    $current_date =$ar_day.' '.date('d',strtotime($your_date)).' / '.$ar_month.' / '.date('Y',strtotime($your_date));
    $data = $current_date;

    return $data;
}
