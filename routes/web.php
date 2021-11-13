<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // this is for Auth Admis user
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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/HomeController/{id}/{user_id}/Company', 'HomeController@dashboard')->name('dashboard');
Route::get('/addproduct', 'addproduct@index')->name('addproduct');
Route::get('/addproduct/findsubcategory', 'addproduct@findsubcategory')->name('findsubcategory');

Route::get('/addproduct/adddatapost', 'addproduct@adddatapost')->name('adddatapost');

Route::get('/addproductlist', 'addproductlist@index')->name('addproductlist');
Route::get('/addproductlist/update_data', 'addproductlist@update_data')->name('update_data');
Route::get('/addproductlist/test', 'addproductlist@test')->name('test');
Route::get('/addproductlist/finddata', 'addproductlist@finddata')->name('finddata');
Route::get('/addproductlist/deleteinfo', 'addproductlist@deleteinfo')->name('deleteinfo');
Route::get('/addproductlist/fetch_data', 'addproductlist@fetch_data');


//Route::post('product_form', 'addproduct@adddatapost')->name('adddatapost');


Route::post('/proudctlist_edit/{id}/studentpendinglistsubmitEdit','studentpendinglist_edit@add_dataedit');

Route::get('/proudctlist_edit/{id}/edit', 'proudctlist_edit@index')->name('proudctlist_edit');

Route::post('/proudctlist_edit/{id}/registrationsubmitEdit','proudctlist_edit@add_dataedit');
