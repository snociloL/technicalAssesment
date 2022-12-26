<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Public Routes
        Route::resource('students', StudentController::class);
        //Route::get('/students/search/{name}', [StudentController::class, 'search']);

        //Route::get('/students/search/{email}', [StudentController::class, 'search']);

        // Route::get('/students', [StudentController::class, 'index']);


        // Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        //     return $request->user();
        // });


// Protected Routes
        Route::group(['middleware' => ['auth:sanctum']], function() {
            Route::get('/students/search/{name}', [StudentController::class, 'search']);
            Route::post('/students', [StudentController::class, 'store']);
            Route::put('/students/{id}', [StudentController::class, 'update']);
            Route::delete('/students/{id}', [StudentController::class, 'destroy']);
        });