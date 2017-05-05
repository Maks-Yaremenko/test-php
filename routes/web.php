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

Route::get('/recipe', 'RecipeController@all')->name('recipe');
Route::post('/recipe', 'RecipeController@create')->name('recipe-new');
Route::delete('/recipe', 'RecipeController@delete')->name('recipe-delete');

Route::get('/ingredient', 'IngredientController@all')->name('ingredient');
Route::post('/ingredient', 'IngredientController@create')->name('ingredient-new');
Route::delete('/ingredient', 'IngredientController@delete')->name('ingredient-delete');
