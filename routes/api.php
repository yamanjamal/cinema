<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HallController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PriceController;
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
    
    // +++++++++++++++++++++++++++++++start Hall api++++++++++++++++++++++++++++++++
    Route::group(['prefix' => 'Hall','controller'=>HallController::class], function() {
        Route::get('/',                          'index');
        Route::post('/',                          'store');
    });
    
    // +++++++++++++++++++++++++++++++end Hall api++++++++++++++++++++++++++++++++++

     // +++++++++++++++++++++++++++++++start Time api++++++++++++++++++++++++++++++++
     Route::group(['prefix' => 'Time','controller'=>TimeController::class], function() {
        Route::get('/',                          'index');
        Route::post('/',                          'store');
        Route::get('/{time}',                      'edit');
        Route::put('/{time}',                   'update');
        Route::get('activate/{time}',                 'activate');
        Route::get('deactivate/{time}',               'deactivate');
    });
    
    // +++++++++++++++++++++++++++++++end Time api++++++++++++++++++++++++++++++++++

     // +++++++++++++++++++++++++++++++start Movie api++++++++++++++++++++++++++++++++
    Route::group(['prefix' => 'Movie','controller'=>MovieController::class], function() {
        Route::get('/',                    'index');
        Route::get('/create',              'create');
        Route::post('/',                   'store');
        Route::put('/{movie}',             'show');
        Route::get('/{movie}/edit',        'edit');
        Route::put('/{movie}',           'update');
        Route::get('/{movie}',          'destroy');
        Route::get('/search',           'search');
    });
    // +++++++++++++++++++++++++++++++end Movie api++++++++++++++++++++++++++++++++++


    // +++++++++++++++++++++++++++++++start Price api++++++++++++++++++++++++++++++++
    Route::group(['prefix' => 'Price', 'controller' => PriceController::class], function() {
        Route::get('/',                    'index');
        Route::put('/{price}',           'update');
    });
    // +++++++++++++++++++++++++++++++end Price api++++++++++++++++++++++++++++++++++
    Route::apiresource('tasks',          TaskController::class);
});

require __DIR__.'/Basecode.php'; 


