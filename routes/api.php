<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('/staffworkexperiencestore', 'WorkExperienceController@store');
Route::post('/staffachievementsstore', 'AchievementsController@store');

Route::post('/staffworkexperienceupdate', 'WorkExperienceController@update');
Route::post('/staffprofileimageupdate', 'ProfileController@updateImage');
Route::post('/staffprofiletextupdate', 'ProfileController@updateText');
Route::post('/staffachievementsupdate', 'AchievementsController@update');
Route::post('/staffuserupdate', 'HomeController@update');

Route::get('/staffworkexperienceget', 'WorkExperienceController@get');
Route::get('/staffprofileget', 'ProfileController@get');
Route::get('/staffachievementsget', 'AchievementsController@get');
Route::get('/staffuserget', 'HomeController@get');

Route::delete('workexperience/{id}', 'WorkExperienceController@destroy');
Route::delete('achievements/{id}', 'AchievementsController@destroy');
Route::delete('profileimage', 'ProfileController@destroy');

