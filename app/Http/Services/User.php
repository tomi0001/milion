<?php

namespace App\Http\Services;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Http\Request;
use Request;
//use Illuminate\Support\Facades\Input as Input;
use Auth;

use Illuminate\Support\Facades\Password as Password;
use Hash;
use DB;
use App\User as Users;
//use App\Hash as Hash2;
use Cookie;
//class User {
class User {
    //put your code here
    
    public $error = [];
    public function checkFields() {
        if (Request::get("login") == "") {
            array_push($this->error,"Musisz uzupełnić pole login");
        }
        else if (!$this->checkifExist(Request::get("login"),"login")) {
            array_push($this->error,"Juz jest użytkowik o takim loginie");
        }
        if (Request::get("email") == "") {
            array_push($this->error,"Musisz uzupełnić pole email");
        }
        else if (!$this->checkifExist(Request::get("email"),"email")) {
            array_push($this->error,"Juz jest użytkowik o takim emailu");
        }
        if (Request::get("password") == "") {
            array_push($this->error,"Uzupełnij pole hasło");
        }
        else if (strlen(Request::get("password")) < 6) {
            array_push($this->error,"Hasło jest za krótkie");
        }
        if (Request::get("password") != Request::get("passwordConfirm")) {
            array_push($this->error,"Podane hasła różnią się");
        }
    }
    
    
    public function saveUser() {
        $User  = new Users;
        $User->login = Request::get("login");
        $User->email = Request::get("email");
        $User->password = Hash::make(Request::get("password"));
        $User->save();
    }
    
    private function checkifExist($login,$what) {
        $User = new Users;
        $bool = $User->where($what,$login)->first();
        if (empty($bool)) {
            return true;
        }
        else {
            return false;
        }
        
    }
}
