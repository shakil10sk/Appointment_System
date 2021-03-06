<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     // return view('welcome');
//     return view('layouts.enterprener.home');

// });

Route::get('/','IndexController@home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('mentor/list','EnterprenerController@index')->name('mentor.list');
Route::get('mentor/{id}','EnterprenerController@showDoctor');

// Enterprener
Route::prefix('/user')->group(function(){
    Route::group(['middleware'=>['auth']],function(){
        Route::post('appointment','AppointmentController@store')->name('appointment');
        Route::get('profile/{id}','EnterprenerController@profile')->name('user.profile');
        Route::post('payment','EnterprenerController@Payment');
    });
});



//admin
Route::prefix('/admin')->namespace('Admin')->group(function(){

    Route::match(['get','post'],'/','AdminController@Login');
    Route::group(['middleware'=>['admin']],function(){
        Route::get('dashboard','AdminController@Dashboard');
    });

});

//mentor
Route::prefix('/mentor')->namespace('Mentor')->group(function(){

    Route::match(['get','post'],'/','MentorController@Login');
    Route::get('registration','MentorController@Registration');
    Route::post('registration-store','MentorController@RegistrationStore');

    Route::group(['middleware'=>['mentor']],function(){
        Route::get('dashboard','MentorController@Dashboard');
        Route::get('appointment-lists','MentorController@AppointLists');
        Route::get('appointment-info/{id}','MentorController@AppointInfo');
        Route::get('appointment-pending/{id}','MentorController@AppointmentPending');
        Route::get('appointment-reject/{id}','MentorController@AppointmentReject');
        Route::get('appointment-accept/{id}','MentorController@AppointmentAccepted');
        Route::get('appointment-communication/{id}','MentorController@CommunicationId');
        Route::post('communication-store','MentorController@CommunicationStore');
        Route::get('payment-accept/{id}','MentorController@PaymentAccept');
        Route::get('payment-reject/{id}','MentorController@PaymentReject');
        Route::get('payments-info','MentorController@PaymentsInfo');
        Route::get('password-change','MentorController@PasswordChange');
        Route::post('password-store','MentorController@PasswordStore');n
        Route::get('logout','MentorController@Logout');
    });

});



