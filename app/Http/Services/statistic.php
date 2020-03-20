<?php
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
use App\Statistic as Statistics;
class statistic {
    
    public function saveStatistic($idUsers = 0,$idQuestions = 0,$whatReply = "") {
        $Statistic = new Statistics;
        $Statistic->date = date("Y-m-d H:i:s");
        $Statistic->ip = Request::ip();
        $Statistic->system = Request::userAgent();
        $Statistic->page = Request::url();
        $Statistic->id_users  = $idUsers;
        $Statistic->id_questions = $idQuestions;
        $Statistic->what_reply  = $whatReply;
        $Statistic->save();
        //$Statistic->date = date("Y-m-d H:i:s");
        
    }
     
}
