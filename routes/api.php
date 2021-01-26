<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiUserController;
use App\Http\Controllers\apiChildController;
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
Route::get('/db', function () {
    return json_encode(['red'=>1]);
});
Route::post("/signup",[apiUserController::class, 'Signup']);
Route::post("/login",[apiUserController::class, 'login']);
Route::post("/add-state",[apiChildController::class, 'addState']);
Route::post("/get-state",[apiChildController::class, 'getAllstate']);
Route::post("/get-district",[apiChildController::class, 'getAlldistrict']);
Route::post("/add-district",[apiChildController::class, 'addDistrict']);
Route::post("/get-district/{id}",[apiChildController::class, 'getDistrictByState']);
Route::post("/add-child",[apiChildController::class, 'addChild']);
Route::post("/view-child",[apiChildController::class, 'showChild']);
Route::post("/view-child/{id}",[apiChildController::class, 'viewChild']);