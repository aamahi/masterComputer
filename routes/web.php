<?php

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
//          Auth Route
Auth::routes();

Route::get('/home', function(){return redirect()->route('home');});

//        Admin Route
Route::get('/',function (){ return redirect()->route('home'); });
Route::get('/admin','Admin\BkashController@bkash')->name('home');



//New Mastaser COmputer
Route::get('/bkash','Admin\BkashController@bkash')->name('bkash');
Route::post('/bkash','Admin\BkashController@addBkash');
Route::get('/reciveBkash/{id}','Admin\BkashController@reciveBkash')->name('reciveBkash');
Route::get('/sendBkash/{id}','Admin\BkashController@sendBkash')->name('sendBkash');
Route::get('/deleteBkash/{id}','Admin\BkashController@deleteBkash')->name('deleteBkash');
Route::get('/editBkash/{id}','Admin\BkashController@editBkash')->name('editBkash');
Route::post('/update/bkash/{id}','Admin\BkashController@updateBkash');
Route::get('/custoamr','Admin\CustomarController@customar')->name('customar');
Route::get('/edit/custoamr/{id}','Admin\CustomarController@editCustomar')->name('editCustomar');
Route::post('/update/custoamr/{id}','Admin\CustomarController@updateCustomar')->name('Updatecustomar');
Route::post('/custoamr','Admin\CustomarController@addCustomar');
Route::get('/delete/custoamr/{id}','Admin\CustomarController@deleteCustomar')->name('deleteCustomar');
Route::get('/baki/khata','Admin\BakikhataController@bakiKhata')->name('bakiKhata');
Route::post('/baki/khata','Admin\BakikhataController@addbakiKhata');
Route::get('/baki/hisab/{id}','Admin\BakikhataController@bakiHisab')->name('bakiHisab');
Route::get('/report','Admin\BakikhataController@report')->name('report');
Route::get('/delete/report/{id}','Admin\BakikhataController@deleteReport')->name('deleteReport');
