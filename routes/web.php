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

Route::group(['middleware' => ['permission:appointments|patients']], function () {
    //Route::get('/appointments', 'AppointmentsController@index');
    Route::resource('appointments', 'AppointmentsController');
    Route::resource('patients', 'PatientsController');
    Route::resource('patients/notes', 'PatientNotesController');
});

