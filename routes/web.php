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

Route::get('/','IndexController@home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/aboutUs', 'IndexController@AboutUs')->name('about');


Route::match(['get','post'],'user/mentor/list','EnterprenerController@index')->name('book.mentor.list');
Route::get('user/mentor/{id}','EnterprenerController@showDoctor');

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
    Route::match(['get','post'],'/logout','AdminController@Logout');

    Route::group(['middleware'=>['admin']],function(){
        Route::get('dashboard','AdminController@Dashboard');
        Route::get('mentorsList','AdminController@mentorList')->name('admin.mentorList');
        Route::get('/accept-status/{id}','AdminController@acceptStatus')->name('admin.acceptStatus');
        Route::get('/reject-status/{id}','AdminController@rejectStatus')->name('admin.rejectStatus');

        Route::get('userList','AdminController@userList')->name('admin.userList');
        Route::get('/enable-status/{id}','AdminController@enableStatus')->name('admin.enableStatus');
        Route::get('/disable-status/{id}','AdminController@disableStatus')->name('admin.disableStatus');


        Route::get('category','CategoryController@index')->name('category.list');
        Route::post('category/store','CategoryController@store');
        Route::get('category/{id}/edit','CategoryController@edit');
        Route::get('category/{id}/delete','CategoryController@destroy');
    });
});

//mentor
Route::prefix('/mentor')->namespace('Mentor')->group(function(){

    Route::match(['get','post'],'/','MentorController@Login');
    Route::get('registration','MentorController@Registration');
    Route::post('registration-store','MentorController@RegistrationStore');
    Route::post('/getupazila','MentorController@getThana');

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
        Route::post('password-store','MentorController@PasswordStore');
        Route::get('logout','MentorController@Logout');
    });

});


