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
Route::get('/admin','HomeController@index')->name('home');
Route::get('/dashboard','HomeController@index')->name('home');
Route::post('/dashboard','HomeController@addSale');
Route::get('/delete/sale/{id}','HomeController@deleteSale')->name('deleteSale');

Route::get('/mc/sale','HomeController@mcSale')->name('mcsale');
Route::post('/mc/sale','HomeController@addMcSale');


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

Route::get('/joma','Admin\JomaController@index')->name('joma');
Route::post('/joma','Admin\JomaController@addJoma');
Route::get('/viewJoma/{id}','Admin\JomaController@viewJoma')->name('viewJoma');

Route::get('/flexiload','Admin\JomaController@flexiload')->name('flexiload');
Route::post('/flexiload','Admin\JomaController@Addflexiload');


//Product Info
Route::get('/product','ProductController@product')->name('product');
Route::post('/product','ProductController@AddProduct');
Route::get('/delete/product/{id}','ProductController@deleteProduct')->name('deleteProduct');
Route::get('/edit/product/{id}','ProductController@editProduct')->name('editProduct');
Route::post('/edit/product/{id}','ProductController@updateProduct');
