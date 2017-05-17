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
Route::post('/supersecret_tutor_search','InstructorController@supersecret_tutor_search');
Route::post('/supersecret_student_search','InstructorController@supersecret_student_search');
//Route::post('/login')
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
