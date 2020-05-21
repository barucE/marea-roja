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

Route::get('/', 'Question@index')->name('question.index');

Route::get('/register', 'Register@index')->name('register.index');
Route::post('/save-session', 'Register@store');
Route::post('/set-score', 'Register@setScore')->name('register.setScore');