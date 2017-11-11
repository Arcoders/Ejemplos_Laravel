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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function()
{
    Route::resource('pizzas', 'PizzaController');
    Route::patch('pizzas/{id}/restore', 'PizzaController@restore')->name('pizzas.restore');
});

Route::group(['middleware' => 'admin', 'prefix' => 'administration'], function()
{
    Route::get('/', 'AdminController@index')->name('admin.panel');

    Route::resource('users', 'Admin\UserController', [
        'as' => 'admin'
    ]);

    Route::resource('pizzas', 'Admin\PizzaController', [
        'as' => 'admin'
    ]);

    Route::resource('ingredients', 'Admin\IngredientController', [
        'as' => 'admin'
    ]);
});