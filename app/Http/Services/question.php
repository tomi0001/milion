<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Services;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of statistic
 *
 * @author tomi
 */
use Request as Request;
use App\Categorie as Categorie;
use App\Subcategorie as Subcategorie;
use App\Question as Queston;
use App\Questions_statu as Questions_statu;
use DB;
use Auth;
/**
 * Description of question
 *
 * @author tomi
 */
class question {
    //put your code here
    public $listCategorie = [];
    public $error = [];
    public $questions;
    public $price1 = array(
        "50 zł",
       "100 zł",
         "200 zł",
      "300 zł",
         "500 zł",
         "1 000 zł",
       "2 000 zł",
         "4 000 zł",
        "5 000 zł",
         "8 000 zł",
        "10 000 zł",
        "20 000 zł",
        "40 000 zł",
         "50 000 zł",
        "70 000 zł",
         "100 000 zł",
        "200 000 zł",
        "300 000 zł",
         "500 000 zł",
        "750 000 zł",
       "1 000 000 zł",
       "2 000 000 zł",
         "4 000 000 zł",
         "5 000 000 zł",
        );
        public $price2 = array(
       "100 zł",
      "300 zł",
         "500 zł",
         "1 000 zł",
       "2 000 zł",
        "5 000 zł",
        "10 000 zł",
        "20 000 zł",
        "40 000 zł",
         "50 000 zł",
         "100 000 zł",
        "200 000 zł",
         "500 000 zł",
       "1 000 000 zł",
         "4 000 000 zł",
         "5 000 000 zł",
        );
    public $price3 = array(
         "500 zł",
         "1 000 zł",
       "2 000 zł",
        "5 000 zł",
        "20 000 zł",
         "50 000 zł",
         "100 000 zł",
        "200 000 zł",
         "500 000 zł",
       "1 000 000 zł",
         "5 000 000 zł",
        );
    public function selectCategorie() {
        $Categorie = new Categorie;
        $this->listCategorie = $Categorie->all();

    }
    public function addNewCategorie() {
        $Categorie = new Categorie;
        $Categorie->name = Request::get("categories");
        $Categorie->save();
    }
    public function addNewSubCategorie() {
        $Subcategorie = new Subcategorie;
        $Subcategorie->name = Request::get("subCategories");
        $Subcategorie->id_categories = Request::get("idCategories");
        $Subcategorie->save();
    }
    public function checkCategorie() {
        if (Request::get("categories") == "") {
            array_push($this->error,"Musisz coś wpisać");
        }
        if ($this->checkIfExistCategories() == false) {
            array_push($this->error,"Już jest dana kategoria");
        }
    }
    public function checkSubCategorie() {
        if (Request::get("subCategories") == "") {
            array_push($this->error,"Musisz coś wpisać");
        }
        if ($this->checkIfExistSubCategories() == false) {
            array_push($this->error,"Już jest dana kategoria");
        }
        if (Request::get("idCategories") == "") {
            array_push($this->error,"Musisz wybrać kategortie z listy");
        }
    }
    public function randReply($correct) {
        $array = [];
        $intReply = "";
        switch ($correct) {
            case 'a': $intReply = 1;
                break;
            case 'b': $intReply = 2;
                break;
            case 'c': $intReply = 3;
                break;
            default: $intReply = 4;
                break;
            
        }
        $one = "";
        $two  ="";
        while (true) {
            $one = rand(1,4);
            $two = rand(1,4);
            if ($one != $intReply and $two != $intReply and $one != $two) {
                break;
            }
        }
        switch ($one) {
            case 1: $array[0] = 'A';
                break;
            case 2: $array[0] = 'B';
                break;
            case 3: $array[0] = 'C';
                break;
            default: $array[0] = 'D';
                break;
            
        }
        switch ($two) {
            case 1: $array[1] = 'A';
                break;
            case 2: $array[1] = 'B';
                break;
            case 3: $array[1] = 'C';
                break;
            default: $array[1] = 'D';
                break;
            
        }
        return array("one" => $array[0],"two" => $array[1]);
    }
    public function checkQuestion() {

        if (Request::get("question") == "") {
            array_push($this->error,"Uzupełnij pole pytanie");
        }
        if ($this->checkIfExistSubCategories() == false) {
            array_push($this->error,"Już jest dana kategoria");
        }
        if (Request::get("questionA") == "") {
            array_push($this->error,"Uzupełnij pole odpowiedź A");
        }
        if (Request::get("questionB") == "") {
            array_push($this->error,"Uzupełnij pole odpowiedź B");
        }
        if (Request::get("questionC") == "") {
            array_push($this->error,"Uzupełnij pole odpowiedź C");
        }
        if (Request::get("questionD") == "") {
            array_push($this->error,"Uzupełnij pole odpowiedź D");
        }
        if (Request::get("correctQuestion") == "") {
            array_push($this->error,"Uzupełnij pole poprawna odpowiedź ");
        }
        if (Request::get("sectionQuestion") == "") {
            array_push($this->error,"Musisz uzupełnić pole przedział pytania");
        }
        if (Request::get("categories") == "") {
            array_push($this->error,"Wybierz kategorie ");
        }

    }
    private function checkIfExistSubCategories() {
        $Subcategorie = new Subcategorie;
        $bool = $Subcategorie->where("name",Request::get("subCategories"))->get();
        if (count($bool) == 0) {
            return true;
        }
        else {
            return false;
        }
    }
    private function checkIfExistCategories() {
        $Categorie = new Categorie;
        $bool = $Categorie->where("name",Request::get("categories"))->get();
        if (count($bool) == 0) {
            return true;
        }
        else {
            return false;
        }
    }
    public function loadSubCategorie($idCategorie) {
        $Subcategorie = new Subcategorie;
        $list = $Subcategorie->where("id_categories",$idCategorie)->get();
        return $list;

    }
    public function readQuestion() {
        $Questions_statu = new Questions_statu;
        $questionName = $Questions_statu->where("id_users",Auth::User()->id)->orderBy("id","DESC")->first();
        $Queston = new Queston;
        $ABCD = $Queston->where("id",$questionName->id_questions)->first();
        return $ABCD->correct_answer;
    }
    public function addNewQuestion() {
        $Queston = new Queston;
        $Queston->questions = Request::get("question");
        $Queston->reply1  = Request::get("questionA");
        $Queston->reply2  = Request::get("questionB");
        $Queston->reply3 = Request::get("questionC");
        $Queston->reply4 = Request::get("questionD");
        $Queston->correct_answer  = Request::get("correctQuestion");
        $Queston->level_questions  = Request::get("sectionQuestion");
        $Queston->id_categories = Request::get("categories");
        $Queston->id_subcategories = Request::get("subCategories");
        $Queston->save();


    } 
    
    private function setNr($nr,$type) {
        $array =[];
        if ($type== 1) {
            if ($nr == 1) {
                //500 zł
                $array = [1,2,3,4,5];
            }
            //1 000 zł
            else if ($nr == 2) {
                $array = [6];
            }
            //2 000 zł
            else if ($nr == 3) {
                $array = [7];
            }
            //5 000 zł
            else if ($nr == 4) {
                $array = [8,9];
            }
            //20 000 zł
            else if ($nr == 5) {
                $array = [10,11,12];
            }
            //50 000 zł
            else if ($nr == 6) {
                $array = [13,14];
            }
            //100 000 zł
            else if ($nr == 7) {
                $array = [15];
            }
            //200 000 zł
            else if ($nr == 8) {
                $array = [16,17];
            }
            //500 000 zł
            else if ($nr == 9) {
                $array = [18,19];
            }
            //1 000 000 zł
            else if ($nr == 10) {
                $array = [20,21];
            }
            else {
                $array = [22,23,24];
            }
            
        }
        else if ($type== 2) {
            if ($nr == 1) {
            
                $array = [1,2];
            }
            
            else if ($nr == 2) {
                $array = [2,4];
            }
            
            else if ($nr == 3) {
                $array = [5];
            }
            
            else if ($nr == 4) {
                $array = [6];
            }
            
            else if ($nr == 5) {
                $array = [7];
            }
            
            else if ($nr == 6) {
                $array = [8,9];
            }
            
            else if ($nr == 7) {
                $array = [10,11];
            }
            
            else if ($nr == 8) {
                $array = [12];
            }
            
            else if ($nr == 9) {
                $array = [13];
            }
            
            else if ($nr == 10) {
                $array = [14];
            }
            else if ($nr == 11){
                $array = [15,16];
            }
            else if ($nr == 12){
                $array = [17];
            }
            else if ($nr == 13){
                $array = [18,19];
            }
            else if ($nr == 14){
                $array = [20,21];
            }
            else if ($nr == 15){
                $array = [22,23];
            }
            else {
                $array = [24];
            }
            
        }
        else {
            $array = [$nr];
        }
        return $array;
    }
    
    public function getQuestion($nr,$idCategories,$idSubCategories) {
        //print $idCategories;
        $nrArray = $this->setNr($nr, Request::get('type'));
        $Queston = Queston::query();
        $que = Queston::query();
         $que2 = Queston::query();
         
        //$if_use = null;
         $que->whereIn("level_questions",$nrArray)->where("if_use",null);
                
                if ($idCategories != "") {
                    $que->where("id_categories",$idCategories);
                }
                if ($idSubCategories != "") {
                    $que->where("id_subcategories",$idSubCategories);
                }
                
                $que->orderBy(DB::Raw("rand()"))->limit(1);
               $this->questions =   $que->first();
        if (empty($this->questions) ) {
             $que2->whereIn("level_questions",$nrArray);
                //$que2->where("level_questions",$nr);
                
                if ($idCategories != "") {
                    $que2->where("id_categories",$idCategories);
                }
                if ($idSubCategories != "") {
                    $que2->where("id_subcategories",$idSubCategories);
                }
                
                $que2->orderBy(DB::Raw("rand()"))->limit(1);
                 //$que2->first();
                  $this->questions = $que2->first();
        }
        //print $nr;
       
    }
    public function updateQuestion() {
        $Queston = new Queston;
        $Queston::where("id",$this->questions->id)->update(["if_use" => 1]);

    }
    public function loadPriceForQuestion($idCategories,$idSubCategories) {
        if ($idCategories == "" and $idSubCategories == "") {
            return array_reverse($this->price3);
        }
        else if ($idCategories != "" and $idSubCategories == "") {
            return array_reverse($this->price2);
        }
        else {
            return array_reverse($this->price1);
        }
        /*
        if ($type == 1) {
            
        }
        else if ($type == 2) {
            return array_reverse($this->price2);
        }
        else {
            return array_reverse($this->price3);
        }
         * 
         */









    }
    public function saveQuestionStatus($id,$nr) {
        $questions_status = new Questions_statu;
        $questions_status->id_questions = $id;
        $questions_status->id_users = Auth::User()->id;
        $questions_status->level_questions = $nr;
        $questions_status->save();

    }
    public function checkQuestionABCD($ABCD) {
        $questions_status = new Questions_statu;
        $bool = $questions_status->join("questions","questions.id","questions_status.id_questions")
                                  ->selectRaw("questions.correct_answer  as correct_answer")
                                 ->where("id_users",Auth::User()->id)
                ->orderBy("questions_status.id","DESC")->first();
        return $bool;
    }
}
