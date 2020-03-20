<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Services;

/**
 * Description of user
 *
 * @author tomi
 */


use Request as Request;
use App\User as Users;
use Hash;


class user {
    public $error = [];
    public function checkIfRoot() {
        $Users = new Users;
        $list = $Users->where("login","root")->first();
        if ($list->password == "") {
            return false;
        }
        else {
            return true;
        }
    }
    public function checkPassword() {
        if (Request::get("password") == "") {
            array_push($this->error,"Musisz wpisac hasło");
        }
        if (Request::get("password") != Request::get("passwordConfirm")) {
            array_push($this->error,"Podane hasła różnią się");
        }
    }
    public function savePassword() {
        $Users = new Users;
        $Users->where("login","root")->update(["password" => Hash::make(Request::get("password"))]);
    }
    public function saveUser() {
        $Users = new Users;
        $Users->login = Request::get("login");
        $Users->password = Hash::make("password");
        $Users->save();
    }
    public function selectLastUser() {
        $Users = new Users;
        $login = $Users->where("login",Request::get("login"))->orderBy("id","DESC")->first();
        return $login->id;
    }
}
