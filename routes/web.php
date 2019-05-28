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

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PatientNotesController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['permission:appointments|patients']], function () {
    Route::get('getAllUsers', function (){
       $users = User::select(['id','name'])->get();

       return $users->toArray();
    });
    //Route::get('/appointments', 'AppointmentsController@index');
    Route::resource('appointments', 'AppointmentsController');
    Route::resource('patients', 'PatientsController');
    Route::resource('patients/notes', 'PatientNotesController');
    Route::get('pnget/{id}', function ($id) {
        $patientNote = new PatientNotesController();

        return $patientNote->pnget($id);
    });
    Route::get('psearch', 'PatientsController@search');
});

Route::group(['middleware' => ['role:admin']], function () {
    //Route::get('/appointments', 'AppointmentsController@index');
    Route::get('admin', 'AdminController@index');

    Route::get('admin/roles', 'AdminController@roles');
    Route::post('admin/task/create-role', 'AdminController@roleCreate');
    Route::get('admin/roles/{id}/delete', function ($id) {
        $admin = new AdminController();

        return $admin->roleDelete($id);
    });
    Route::get('admin/roles/{id}', function ($id) {
        $admin = new AdminController();

        return $admin->roleGet($id);
    });
    Route::get('admin/roles/{id}/edit', function ($id, Request $request) {
        $admin = new AdminController();

        return $admin->roleEdit($request, $id);
    });

    Route::resource('admin/staff', 'StaffController');
    Route::get('assearch', 'StaffController@search');
});
