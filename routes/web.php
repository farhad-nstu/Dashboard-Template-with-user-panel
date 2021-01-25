<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/','FrontendController@index')->name('front.home');

// ['register'=>false]
Auth::routes();

// Route::get('locale/{locale}',function($locale){
//     Session::put('locale',$locale);
//     return redirect()->back();
// });


Route::get('/home', 'HomeController@index')->name('home');

//User Registration
Route::get('/user-registration','UserRegistrationController@showRegistrationForm')->name('user-registration')->middleware('auth');

Route::post('/user-registration','UserRegistrationController@userSave')->name('user-save')->middleware('auth');

Route::get('/user-list','UserRegistrationController@userList')->name('user-list')->middleware('auth');

Route::get('/status-active/{userId}','UserRegistrationController@statusActive')->name('status-active')->middleware('auth');

Route::get('/status-deactive/{userId}','UserRegistrationController@statusDeactive')->name('status-deactive')->middleware('auth');


//Change Languages
Route::get('lang/change', 'HomeController@change')->name('changeLang');

Route::get('/home/application-settings', 'HomeController@showSettings')->name('showSettings');

Route::get('/home/view-profile', 'HomeController@viewProfile')->name('viewProfile');

Route::post('/home/view-profile', 'HomeController@updateProfile')->name('profileUpdate');

//Change Password
Route::get('/home/password-change-view', 'HomeController@passwordChangeView')->name('passwordChangeView');

Route::post('/home/password-change-view', 'HomeController@passwordUpdate')->name('passwordUpdate');

Route::post('/home/application-settings', 'HomeController@settingsUpdate')->name('settings-update');


//// Student upload in excel ///
Route::get("/import", "UserRegistrationController@import_file")->name('excel');
Route::post("/import", "UserRegistrationController@import_excel")->name('excel.import');

//Rules routes

Route::group(['prefix' => 'admin','middleware'=>'auth', 'namespace'=>'Admin'], function () {


});
