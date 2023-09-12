<?php

use Morilog\Jalali\Jalalian;
use Illuminate\Support\Facades\Route;

function newFeedbackes($title = 'با موفقعیت',$body = 'عملیات انجام شد',$type = 'success')
{
    $session = session()->has('feedbacks') ? session()->get('feedbacks') : [] ;
    $session[] = ['title' => $title, 'body' => $body, 'type' => $type];
    session()->flash('feedbacks',$session);
}

function providerGetRoute($path,$controller,$method,$name){

    return Route::get($path,['uses' => $controller.'@'.$method ,'as' => $name]);
}


function unixToGregorian($unix){

    date_default_timezone_set('Asia/Tehran');
    return date("Y-m-d h:m:s", $unix / 1000);
}

function dateFromJalali($date, $format = 'Y/m/d')
{
    return $date ? Jalalian::fromFormat($format, $date)->toCarbon() : null;
}

function getJalaliFromFormat($date, $format = "Y/m/d" ){
    return Jalalian::fromCarbon(\Carbon\Carbon::createFromFormat($format, $date))->format($format);
}
