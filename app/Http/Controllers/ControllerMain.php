<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Services\User as User;
use Illuminate\Support\Facades\Input as Input;
use App\Http\Services\calendar as Calendar;
use Auth;
use Hash;
use DB;
//namespace App\Http\Controllers;

/**
 * Description of ControllerUser
 *
 * @author tomi
 */
class ControllerMain {
    public function main($year = "",$month = "",$day = "",$action = "") {
        if ( (Auth::check()) ) {
            $kalendar = new Calendar($month,$action,$day,$year);
            return View("main.main") ->with("month",$kalendar->month)
                    ->with("year",$kalendar->year)
                    ->with("day",$kalendar->day)
                    ->with("action",$kalendar->action)
                    ->with("how_day_month",$kalendar->how_day_month)
                    ->with("back",$kalendar->back_month)
                    ->with("next",$kalendar->next_month)
                    ->with("back_year",$kalendar->back_year)
                    ->with("next_year",$kalendar->next_year)
                    ->with("text_month",$kalendar->text_month)
                    ->with("day2",1)
                    ->with("day1",1)
                    ->with("day3",$kalendar->day)
                    //->with("listMood",$Moods->arrayList)
                    //->with("count",count($Moods->arrayList))
                    //->with("listPercent",$Moods->listPercent)
                    //->with("colorForDay",$Moods->colorForDay)
                    //->with("colorDay",$Moods->colorDay)
                    ->with("color",1)
                    ->with("day_week",$kalendar->day_week);
        }
        else {
            return Redirect("/user/login");
        }
    }
}
