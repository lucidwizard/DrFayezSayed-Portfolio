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


Route::view('/achievements', 'achievements');
Route::view('/workexperience', 'workexperience');

//Route::get('/userget', 'HomeController@get');
Route::get('/profileget', 'ProfileController@get');
Route::get('/workexperienceget', 'WorkExperienceController@get');
Route::get('/achievementsget', 'AchievementsController@get');

Route::get('/staffprofile', 'ProfileController@show');

Route::get('/changepassword', 'HomeController@show');
/*
Route::get('/staffprofile/edit', 'ProfileController@edit');
Route::PATCH('/staffprofile/update', 'ProfileController@update');
*/

Route::get('/staffachievements', 'AchievementsController@show');

Route::get('/staffworkexperienceindex','WorkExperienceController@index');
Route::get('/staffworkexperience','WorkExperienceController@show');

//Route::get('/', function () {
//    return view('welcome');
//});
Route::view('/', 'welcome');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();