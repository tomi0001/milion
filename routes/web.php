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

Route::get('/main/{year?}/{month?}/{day?}/{action?}', "ControllerMain@main");

Route::get("/user/login","ControllerUser@login");
Route::get("/user/register","ControllerUser@register");
Route::post("/user/registerAction","ControllerUser@registerAction");
Route::post("/user/loginAction","ControllerUser@loginAction");