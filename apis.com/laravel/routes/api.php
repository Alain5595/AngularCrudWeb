<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\EmpleadoController;
use App\Http\Controllers\v1\SecurityController;
use App\Http\Controllers\v1\UsersController;

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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/...', function () {
    return $ request->user();
});

*/

Route::middleware(['auth:api'])->group(function () {

});

Route::post('/v1/seguridad/login',[SecurityController::class,'login']);
Route::post('/v1/users',[UsersController::class,'users']);
Route::get('/v1/empleado',[EmpleadoController::class,'getAll']);
Route::get('/v1/empleado/{id}',[EmpleadoController::class,'getItem']);
Route::post('/v1/empleado',[EmpleadoController::class,'store']);
Route::put('/v1/empleado',[EmpleadoController::class,'putUpdate']);
Route::patch('/v1/empleado',[EmpleadoController::class,'patchUpdate']);
Route::delete('/v1/empleado/{id}',[EmpleadoController::class,'delete']);

