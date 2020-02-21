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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/Register_User', 'Register_Controller@Register_User');
Route::post('/Login_User', 'Login_Controller@Login_User');

Route::get('operator', 'HomeController@operator')->middleware('operator');
Route::get('techstaff', 'HomeController@techstaff')->middleware('techstaff');

Route::post('operator/Submit_Ticket', 'Operator_Controller@submit_ticket');

Route::post('operator/Check_Ticket', 'Operator_Controller@Check_Ticket');

Route::get('techstaff/Get_Tickets/', 'Tech_Staff_Controller@Get_Tickets');
