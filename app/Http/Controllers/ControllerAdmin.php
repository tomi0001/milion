<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

/**
 * Description of ControllerAdmin
 *
 * @author tomi
 */
use Request as Request;
use Auth;
use App\Http\Services\statistic as Statistic;
use App\Http\Services\user as user;
use App\Http\Services\question as question;
class ControllerAdmin {
    //put your code here
    
    public function main() {
        $Statistic = new Statistic;
        $Statistic->saveStatistic();
        $user = new user;
        $check = $user->checkIfRoot();
        if ($check == false ) {
            return Redirect("/admin/setPassword");
        }
        else if ( !Auth::check()) {
            return Redirect("/admin/login");
        }
        else if ( Auth::User()->login == "root" ){
            return View("admin.main");
        }
        else {
            return Redirect("/admin/login");
        }
    }
    public function setPassword() {
        $Statistic = new Statistic;
        $Statistic->saveStatistic();
        $user = new user;
        $check = $user->checkIfRoot();
        if ($check == false) {
            return View("admin.setPassword");
        }
        else {
            return Redirect("/admin/error")->with("error","Nie możesz ustawiać hasła, poniewaz hasło jest ustawione");
        }
    }
    public function setPasswordAction() {
        $Statistic = new Statistic;
        $Statistic->saveStatistic();
        $user = new user;
        $check = $user->checkIfRoot();
        if ($check == false and !Auth::check()) {
            $user->checkPassword();
            if (count($user->error) != 0) {
                return Redirect("/admin/setPassword")->with("error",$user->error);
            }
            else {
                $user->savePassword();
                return Redirect("/admin/login");
            }
        }
        else {
            return Redirect("/admin/login");
        }
        
    }
    public function login() {
        $Statistic = new Statistic;
        $Statistic->saveStatistic();
        return View("admin.login");
    }
    public function loginAction() {
        $Statistic = new Statistic;
        $Statistic->saveStatistic();
                $user = array(
            "login" => "root",
            "password" => Request::get("password")
            
        );
        if (Request::get('password') == "" ) {
            return Redirect('/admin/login')->with('error','Uzupełnij pole login i hasło');
        }
        if (Auth::attempt($user) ) {
            return Redirect("/admin/main");
        }
        else {
            return Redirect('/admin/login')->with('error','Nie prawidłowy login lub hasło');
        }
    }
    
    public function newQuestion() {
        $Statistic = new Statistic;
        $Categorie = new question;
        
        if ( (Auth::check()) and Auth::User()->login == "root") {
            $Statistic->saveStatistic(Auth::User()->id);
            $Categorie->selectCategorie();
            return View("admin.newQuestion")->with("categories",$Categorie->listCategorie);
        }
        else {
            $Statistic->saveStatistic();
            return Redirect("/admin/login");
        }
    }
    public function newCategories() {
        $Statistic = new Statistic;
        $Categorie = new question;
        $Categorie->selectCategorie();
        
        if ( (Auth::check()) ) {
            $Statistic->saveStatistic(Auth::User()->id);
            return View("admin.newCategories")->with("Categorie",$Categorie->listCategorie);
        }
        else {
            $Statistic->saveStatistic();
            return Redirect("/admin/login");
        }
    }
    public function addCategorie() {
        $Statistic = new Statistic;
        $Categorie = new question;
        if ( (Auth::check()) and Auth::User()->login == "root" ) {
            $Statistic->saveStatistic(Auth::User()->id);
            $Categorie->checkCategorie();
            if (count($Categorie->error) == 0) {
                $Categorie->addNewCategorie();
                return View("ajax.succes")->with("succes","kategoria dodana pomyslnie");
            }
            else {
                return View("ajax.error")->with("error",$Categorie->error);
            }
        }
        else {
            $Statistic->saveStatistic();
            return Redirect("/admin/login");
        }
    }
    public function addSubCategorie() {
        $Statistic = new Statistic;
        $Categorie = new question;
        if ( (Auth::check()) and Auth::User()->login == "root" ) {
            $Statistic->saveStatistic(Auth::User()->id);
            $Categorie->checkSubCategorie();
            if (count($Categorie->error) == 0) {
                $Categorie->addNewSubCategorie();
                return View("ajax.succes")->with("succes","kategoria dodana pomyslnie");
            }
            else {
                return View("ajax.error")->with("error",$Categorie->error);
            }
        }
        else {
            $Statistic->saveStatistic();
            return Redirect("/admin/login");
        }

   
    }
    public function loadSubCategories() {
        $Statistic = new Statistic;
        $Categorie = new question;
        if ( (Auth::check()) and Auth::User()->login == "root" ) {
            $Statistic->saveStatistic(Auth::User()->id);
            $list = $Categorie->loadSubCategorie(Request::get("idCategorie"));
            
            return View("admin.loadSubCategories")->with("listCategories",$list);
        }
        else {
            $Statistic->saveStatistic();
            return Redirect("/admin/login");
        }
    }
    public function addQuestion() {
        $Statistic = new Statistic;
        $Categorie = new question;
        if ( (Auth::check()) and Auth::User()->login == "root" ) {
            $Statistic->saveStatistic(Auth::User()->id);
            $Categorie->checkQuestion();
            if (count($Categorie->error) == 0) {
                $Categorie->addNewQuestion();
                return View("ajax.succes")->with("succes","kategoria dodana pomyslnie");
            }
            else {
                return View("ajax.error")->with("error",$Categorie->error);
            }
        }
        else {
            $Statistic->saveStatistic();
            return Redirect("/admin/login");
        }
    }
    public function logout() {
        if ( (Auth::check()) ) {
            Auth::logout();
            return View("admin.succes")->with("succes",["Wylogowałeś się pomyślnie"]);
            
        }
                
    }
}
