<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
 * 
 */

Route::get("/","ControllerMain@main");
Route::get("/main/login","ControllerMain@login");
Route::post("/main/loginAction","ControllerMain@loginAction");
Route::get("/main/loadQuestion/{nr?}","ControllerMain@loadQuestion");
Route::get("/main/getQuestion/{ABCD?}","ControllerMain@getQuestion");

Route::get("/admin","ControllerAdmin@main");
Route::get("/admin/setPassword","ControllerAdmin@setPassword");
Route::get("/admin/login","ControllerAdmin@login");
Route::post("/admin/setPasswordAction","ControllerAdmin@setPasswordAction");
Route::post("/admin/loginAction","ControllerAdmin@loginAction");
Route::get("/admin/main","ControllerAdmin@main");
Route::get("/admin/newQuestion","ControllerAdmin@newQuestion");
Route::get("/admin/newCategories","ControllerAdmin@newCategories");
Route::get("/admin/addCategorie","ControllerAdmin@addCategorie");
Route::get("/admin/addSubCategorie","ControllerAdmin@addSubCategorie");
Route::get("/admin/loadSubCategories","ControllerAdmin@loadSubCategories");
Route::get("/admin/addQuestion","ControllerAdmin@addQuestion");
Route::get("/admin/logout","ControllerAdmin@logout");


