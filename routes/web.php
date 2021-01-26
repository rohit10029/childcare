<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\childController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[ 'as' => 'login', 'uses' =>'userController@showlogin']);
Route::post('/signup',[userController::class, 'Signup']);
Route::post('/login',[userController::class, 'login']);
Route::get('/home',[userController::class, 'home']);
Route::get('/state',[childController::class, 'showState']);
Route::get('/district',[childController::class, 'showDistrict']);
Route::get('/child-form',[childController::class, 'childForm']);
Route::get('/get-district/{id}',[childController::class, 'getDistrict']);
Route::post('/add-state',[childController::class, 'addState']);
Route::post('/add-district',[childController::class, 'addDistrict']);
Route::post('/add-child',[childController::class, 'addChild']);
Route::get('/child',[childController::class, 'showChild']);
Route::get('/child-view/{id}',[childController::class, 'viewChild']);
Route::get('/logout',[childController::class, 'logout']);
