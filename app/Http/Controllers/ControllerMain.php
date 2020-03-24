<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
//use Request;
use Request as Request;
use Auth;
use App\Http\Services\statistic as Statistic;
use App\Http\Services\user as user;
use App\Http\Services\question as question;
/**
 * Description of ControllerMain
 *
 * @author tomi
 */
class ControllerMain {
    public function main() {
        //print Request::userAgent();
        if (Auth::check() and Auth::User()->login == "root") {
            return View("main.error")->with("error",["Jesteś zalogowany jako root"]);
        }
        else if (Auth::check()) {
            return View("main.main");
        }
        else {
            return Redirect("/main/login");
        }
    }
    public function login() {
        $Statistic = new Statistic;
        if (Auth::check() and Auth::User()->login == "root") {
            $Statistic->saveStatistic(Auth::User()->id);
            return View("main.error")->with("error",["Jesteś zalogowany jako root"]);
        }
        else if (Auth::check()) {
            $Statistic->saveStatistic(Auth::User()->id);
            return View("main.main");
        }
        else {
            $Statistic->saveStatistic();
            return View("main.login");
        }
       
        
    }
    public function loginAction() {
        $Statistic = new Statistic;
        $User = new user;
        $Statistic->saveStatistic();
        if (Request::get("login") == "") {
            return View("main.error")->with("error",["Muisz coś wpisać"]);
        }
        else {
            $User->saveUser();
            $id = $User->selectLastUser();
        }
                $user = array(
            "id" => $id,
            "password" => "password"
        );
        
        if (Auth::attempt($user) ) {
            return Redirect("/");
        }
        else {
            return Redirect('/admin/login')->with('error','Nie prawidłowy login lub hasło');
        }
    }
    public function loadQuestion($nr) {
       if (Auth::check()) {
        $Statistic = new Statistic;
        $question = new question;
        $question->getQuestion($nr);
        $question->updateQuestion();
        $question->saveQuestionStatus($question->questions->id,$nr);
        $Statistic->saveStatistic(Auth::User()->id,$question->questions->id);
           //$question["question"] = "sdsdfds sdf df dfg";
           //$question["questionA"] = "dd";
           //$question["questionB"] = "dd";
           //$question["questionC"] = "dd";
           //$question["questionD"] = "dd";
           
            //print $a->a;
            $b = json_encode($question->questions);
            print $b;
            
       }
            
            
            
        //print ;
    }
    public function getQuestion($ABCD) {
        if (Auth::check()) {
            $question = new question;
            $bool = $question->checkQuestionABCD($ABCD);
            print $bool;
        }
    }
}
