<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/forum','QuestionsController@index');
Route::get('/forum/create','QuestionsController@create');
Route::post('/forum','QuestionsController@store');
Route::get('/forum/{question}','QuestionsController@show');

Route::put('/forum/{id}','AnswersController@store');

Route::patch('/forum/{question}','QuestionsController@edit');
Route::post('/forum/{question}/update','QuestionsController@update');
Route::delete('/forum/{question}','QuestionsController@destroy');

Route::patch('/forum/answer/{answer}','AnswersController@edit');
Route::post('/forum/answer/{answer}/update','AnswersController@update');
Route::delete('/forum/answer/{answer}','AnswersController@destroy');

Route::get('/question','QuestionsController@showQuestion');
Route::get('/answer','AnswersController@showAnswer');

Route::post("/forum/search",'QuestionsController@search');
