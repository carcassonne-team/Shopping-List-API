<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth'], function() {
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::get('open', 'DataController@open');
});

Route::group([
    'middleware' => ['jwt.verify'],
    'prefix' => 'auth'], function() {

    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::get('closed', 'DataController@closed');
});

Route::group([
    'middleware' => ['jwt.verify'],
    'prefix' => 'products'], function() {

    Route::get('', 'ProductController@index');
    Route::get('/{id}', 'ProductController@indexByCategory');
    Route::post('create', 'ProductController@create');
    Route::put('update/{id}', 'ProductController@update');
});

Route::group([
    'middleware' => ['jwt.verify'],
    'prefix' => 'categories'], function()
{

    Route::get("{id?}",[CategoryController::class,'index']);
    Route::post("create",[CategoryController::class,'create']);
    Route::put("update/{id}",[CategoryController::class,'update']);
});

Route::group([
    'middleware' => ['jwt.verify'],
    'prefix' => 'lists'], function()
{

    Route::get("",'ProductListController@index');
    Route::post("create",'ProductListController@create');
});

Route::group([
    'middleware' => ['jwt.verify'],
    'prefix' => 'basket'], function()
{

    Route::get("{id}",'BasketController@index');
    Route::post("add",'BasketController@add');
});

