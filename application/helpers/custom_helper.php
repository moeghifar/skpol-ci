<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('return_hour_minute'))
{
    function return_hour_minute($time){
        $curTime = explode(':',$time);
        return $newTime = $curTime[0].':'.$curTime[1];
    }
}

if ( ! function_exists('date_indonesian_format'))
{
    function date_indonesian_format($date)
    {
        $curDate = explode("-",$date);  
        $newDate = $curDate[2].'-'.$curDate[1].'-'.$curDate[0];
        return $newDate;
    }   
}

if ( ! function_exists('date_indonesian_month'))
{
    function date_indonesian_month($date)
    {
        $curDate = explode("-",$date);  
        $newDate = $curDate[2].' '.return_indonesian_month($curDate[1]).' '.$curDate[0];
        return $newDate;
    }   
}

if ( ! function_exists('return_indonesian_month'))
{
    function return_indonesian_month($month)
    {
        $bulan = array(
            '1'     => 'Januari',
            '01'    => 'Januari',
            '2'     => 'Februari',
            '02'    => 'Februari',
            '3'     => 'Maret',
            '03'    => 'Maret',
            '4'     => 'April',
            '04'    => 'April',
            '5'     => 'Mei',
            '05'    => 'Mei',
            '6'     => 'Juni',
            '06'    => 'Juni',
            '7'     => 'Juli',
            '07'    => 'Juli',
            '8'     => 'Agustus',
            '08'    => 'Agustus',
            '9'     => 'September',
            '09'    => 'September',
            '10'    => 'Oktober',
            '11'    => 'November',
            '12'    => 'Desember'
        );
        return $bulan[$month];
    }   
}

if ( ! function_exists('return_indonesian_day'))
{
    function return_indonesian_day($day)
    {
        $dayname = array(
            'SUN'     => 'Minggu',
            'MON'    => 'Senin',
            'TUE'     => 'Selasa',
            'WED'    => 'Rabu',
            'THU'     => 'Kamis',
            'FRI'    => 'Jumat',
            'SAT'     => 'Sabtu'
        );
        return $dayname[$day];
    }   
}

if ( ! function_exists('return_indonesian_gender'))
{
    function return_indonesian_gender($gender)
    {
        $genderName = array(
            'L'     => 'Laki-Laki',
            'P'    => 'Perempuan'
        );
        return $genderName[$gender];
    }   
}

if ( ! function_exists('array_search_bool_multi'))
{
    function array_search_bool_multi($needle,$haystack)
    {
        if($needle !== NULL && $haystack !== NULL)
        {
            if(is_array($haystack))
            {
                foreach($haystack as $index => $key){
                    if(is_array($key)){
                        return array_search_bool_multi($needle,$key);
                    } elseif($needle === $key) {
                        return true;
                    }
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }   
}

if ( ! function_exists('array_search_index_bool_multi'))
{
    function array_search_index_bool_multi($needle,$haystack)
    {
        if($needle !== NULL && $haystack !== NULL)
        {
            if(is_array($haystack))
            {
                foreach($haystack as $index => $key){
                    $needleKey = array_keys($needle);
                    if(is_array($key)){
                        return array_search_index_bool_multi($needle,$key);
                    } elseif($needleKey[0] == $index && $needle[$needleKey[0]] == $key) {
                        return true;
                    }
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }   
}

if ( ! function_exists('split_referer_url'))
{
    function split_referer_url()
    {
        return explode('/',$_SERVER['HTTP_REFERER']);
    }   
}

