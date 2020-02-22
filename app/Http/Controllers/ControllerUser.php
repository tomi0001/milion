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
use Auth;
use Hash;
use Request;
use DB;
//namespace App\Http\Controllers;

/**
 * Description of ControllerUser
 *
 * @author tomi
 */
class ControllerUser {
    public function login() {
        if ( (!Auth::check()) ) { 
            return View("user.login");
        }
        else {
            return redirect("/main");
        }
    }
    public function register() {
        if ( (!Auth::check()) ) {
            return View("user.register");
        }
        else {
            return redirect("/main");
        }
    }
    public function registerAction() {
        if ( (!Auth::check()) ) {
            $User = new User;
            $User->checkFields();
            if (count($User->error) > 0) {
                return Redirect("/user/register")->with("error",$User->error)->withInput();
            }
            else {
                $User->saveUser();
                return Redirect("/user/login")->with("succes","Już jestes zarejestrowany możesz się zalogować");
            }
        }
        else {
            return redirect("/main");
        }
        
        
    }
    public function loginAction() {
        $user = array(
            "login" => Request::get("login"),
            "password" => Request::get("password")
            
        );
        if (Request::get('login') == "" or Request::get('password') == "" ) {
            return Redirect('/user/login')->with('error','Uzupełnij pole login i hasło');
        }
        if (Auth::attempt($user) ) {
            return Redirect("/main");
        }
        else {
            return Redirect('/user/login')->with('error','Nie prawidłowy login lub hasło');
        }
    }
}
