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
/**
 * Description of question
 *
 * @author tomi
 */
class question {
    //put your code here
    public $listCategorie = [];
    public $error = [];
    public function selectCategorie() {
        $Categorie = new Categorie;
        $this->listCategorie = $Categorie->all();
        
    }
    public function addNewCategorie() {
        $Categorie = new Categorie;
        $Categorie->name = Request::get("nameCategorie");
        $Categorie->save();
    }
    public function addNewSubCategorie() {
        $Subcategorie = new Subcategorie;
        $Subcategorie->name = Request::get("subCategories");
        $Subcategorie->id_categories = Request::get("idCategories");
        $Subcategorie->save();
    }
    public function checkCategorie() {
        if (Request::get("nameCategorie") == "") {
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
        $bool = $Categorie->where("name",Request::get("nameCategorie"))->get();
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
    
}
