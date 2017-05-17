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

Route::group(['prefix' => 'recipe'], function(){
	Route::get('', 'RecipeController@all');
	Route::get('/new', 'RecipeController@make');
	Route::get('/show/{recipe}', 'RecipeController@show');
	Route::post('/new', 'RecipeController@create');
	Route::delete('/{recipe}', 'RecipeController@delete');
});

Route::group(['prefix' => 'ingredient'], function(){
	Route::get('', 'IngredientController@all');
	Route::get('/autocomplete', 'IngredientController@autocomplete');
	Route::post('', 'IngredientController@create');
	Route::delete('/{ingredient}', 'IngredientController@delete');
});