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
Route::get('/',function(){
	return view('auth.login');
});


Route::get('/addSection','Attendence\SectionController@addSection')->name("addSection");
Route::post('/addSection','Attendence\SectionController@insertSection');
Route::get('/addStudent','Attendence\StudentController@showSection')->name("addStudent");
Route::post('/addStudent','Attendence\StudentController@addStudent');
Route::post('/addStudent1','Attendence\StudentController@addStudent1')->name("addStudent1");
Route::get('/attendence','Attendence\AttendenceController@showSection')->name("attendence");
Route::post('/attendence','Attendence\AttendenceController@attendenceForm');
Route::post('/attendence1','Attendence\AttendenceController@attendenceSubmit')->name('attendence1');

Route::get('/view','Attendence\AttendenceController@showSection1')->name("view");
Route::post('/view','Attendence\AttendenceController@allDateAttendence');
Auth::routes();
Route::post('/view1','Attendence\AttendenceController@fixedDateAttendence')->name("view1");
Route::post('/update','Attendence\AttendenceController@update')->name("update");
Route::get('/home', 'HomeController@index')->name('home');
