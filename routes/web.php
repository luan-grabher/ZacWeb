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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/' . __('tasks'), function () {
    return "Tarefas";
})->name('tasks')->middleware('auth');

Route::get('/' . __('robots'), function () {
    return "Robos";
})->name('robots')->middleware('auth');

Route::get('/' . __('notices'), function () {
    return "Noticias";
})->name('notices')->middleware('auth');

Route::get('/' . __('birthday_messages'), function () {
    return "Mensagens de Aniversário";
})->name('birthday_messages')->middleware('auth');

Route::get('/' . __('overtime_calendar'), function () {
    return "Calendário de Horas Extras";
})->name('overtime_calendar')->middleware('auth');

