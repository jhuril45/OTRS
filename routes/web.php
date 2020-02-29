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







/////////////////////////////////////////////////////////////////////////
Route::middleware(['operator'])->group(function () {
	Route::get('operator', 'HomeController@operator')->middleware('operator');
	Route::post('operator/Submit_Ticket', 'Operator_Controller@submit_ticket');
	Route::post('operator/Check_Ticket', 'Operator_Controller@Check_Ticket');
	Route::get('operator/Get_Services', 'Operator_Controller@Get_Services');
});

Route::middleware(['tech_staff'])->group(function () {
	Route::get('tech_staff', 'HomeController@tech_staff')->middleware('tech_staff');
	Route::get('tech_staff/Get_Tickets', 'Tech_Staff_Controller@Get_Tickets');
	Route::get('tech_staff/Check_Ticket', 'Tech_Staff_Controller@Check_Ticket');
	Route::post('tech_staff/Cater_Ticket', 'Tech_Staff_Controller@Cater_Ticket');
	Route::get('tech_staff/List_Cater_Ticket', 'Tech_Staff_Controller@List_Cater_Ticket');
	Route::post('tech_staff/Finish_Ticket', 'Tech_Staff_Controller@Finish_Ticket');
});



Route::middleware(['tech_head'])->group(function () {
	Route::get('tech_head', 'HomeController@tech_head')->middleware('tech_head');
    Route::get('tech_head/Get_Services', 'Tech_Head_Controller@Get_Services');
    Route::get('tech_head/Get_Tickets', 'Tech_Head_Controller@Get_Tickets');
    Route::get('tech_head/Get_Cater_Tickets', 'Tech_Head_Controller@Get_Cater_Tickets');
    Route::post('tech_head/Submit_Service', 'Tech_Head_Controller@Submit_Service');
    
});

