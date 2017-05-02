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

Route::get('/', function () {
    return view('index');
});
Route::get('/register', 'AccountCreationController@create');
Route::post('/register', 'AccountCreationController@store');
Route::get('/login', 'SessionCreationController@create');
Route::post('/login', 'SessionCreationController@store');
Route::get('/tutors', 'TutorController@list');
Route::get('/tutors_list/{userid}', 'TutorController@show');
Route::get('/supersecret', 'InstructorController@supersecret');
Route::post('/tutor_detail', 'TutorController@store');
Route::get('/logout', 'SessionCreationController@destroy');
Route::post('/namesearch', 'SearchController@name_search');
Route::get('/search', 'SearchController@search');
//Route::post('/login')