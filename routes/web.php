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
    Route::group(['middleware'=>['mentor']],function(){
        Route::get('dashboard','MentorController@Dashboard');
    });

});



