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
Route::get('/tutors', 'TutorController@tutor_list');
Route::get('/tutors_list/{userid}', 'TutorController@show');
Route::get('/supersecret', 'InstructorController@supersecret');
Route::post('/tutor_detail', 'TutorController@store');
Route::get('/logout', 'SessionCreationController@destroy');
Route::post('/namesearch', 'SearchController@name_search');
Route::get('/search', 'SearchController@search');
Route::get('/edit_profile','TutorController@edit_profile');
Route::get('/email_tutor/{id}','TutorController@email_tutor_show');
Route::post('/email_tutor','TutorController@email_tutor_send');
Route::post('/edit_profile','TutorController@update_profile');
Route::post('/supersecret_tutor_search','InstructorController@supersecret_tutor_search');
Route::post('/supersecret_student_search','InstructorController@supersecret_student_search');
Route::get('/student_list', 'InstructorController@student_list');
Route::get ('/inactivate/{id}', 'InstructorController@inactivate');
Route::get ('/activate/{id}', 'InstructorController@activate');
Route::get('/email_students', 'TutorController@email_all_students');
Route::post('/email_students', 'TutorController@send_email_to_all_students');
Route::get('/calculator/{id}', 'TutorController@calculator');
Route::post('/calculator/', 'TutorController@calculate');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
