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
    return redirect()->route('admin.login');
});



Auth::routes();


Route::prefix('admin')->group(function() {

	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin');
	Route::resource('doctor', 'Admin\DoctorController');
    Route::resource('course-management', 'Admin\CourseManagementController');
    Route::get('doctor/delete/{id}', array('as' => 'admin.doctor.delete', 'uses' => 'Admin\DoctorController@delete'));
    Route::get('course-managementr/delete/{id}', array('as' => 'admin.course-management.delete', 'uses' => 'Admin\CourseManagementController@delete'));
    
});