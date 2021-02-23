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

Route::get('/a', function () {
    return view('welcome');
});


Route::get('/categories', function () {
    return view('welcome');
});



Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'HomeController@test')->name('test');
Route::get('/showall', 'CategoryController@showall')->name('category.showall');
Route::resource('category','CategoryController');
Route::resource('admin','Admin');
Route::resource('categories','UserCategoryController');
Route::resource('brand','BrandController');
Route::resource('subcategory','SubcategoryController');

