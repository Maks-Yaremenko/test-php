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

Route::get('/recipe', 'RecipeController@all');
Route::post('/recipe', 'RecipeController@create');
Route::delete('/recipe', 'RecipeController@delete');

Route::get('/ingredient', 'IngredientController@all');
Route::post('/ingredient', 'IngredientController@create');
Route::delete('/ingredient/{ingredient}', 'IngredientController@delete');
