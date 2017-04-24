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
Route::post('/tutors', 'TutorController@list');
//Route::post('/login')