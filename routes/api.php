<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\ProjectController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['middleware'=>'auth:sanctum'], function() {
    
    // +++++++++++++++++++++++++++++++start Time api++++++++++++++++++++++++++++++++
    Route::group(['prefix' => 'Time','controller'=>TimeController::class], function() {
        Route::get('/index',                          'index');
        Route::post('/store',                          'store');
        Route::put('/update/{time}',                   'update');
        Route::get('/activate/{time}',                 'activate');
        Route::get('/deactivate/{time}',               'deactivate');
    });
    
    // +++++++++++++++++++++++++++++++end Time api++++++++++++++++++++++++++++++++++

     // +++++++++++++++++++++++++++++++start Movie api++++++++++++++++++++++++++++++++
    Route::group(['prefix' => 'Movie','controller'=>MovieController::class], function() {
        Route::get('/index',                    'index');
        Route::post('/store',                   'store');
        Route::put('/show/{movie}',             'show');
        Route::put('/update/{movie}',           'update');
        Route::get('/destroy/{movie}',          'destroy');
        Route::post('/search',                   'search');
    });
    
    // +++++++++++++++++++++++++++++++end Movie api++++++++++++++++++++++++++++++++++
    Route::apiresource('tasks',          TaskController::class);
});

require __DIR__.'/Basecode.php'; 


