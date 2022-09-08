<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HallController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\SnackController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;


Route::get('/Movie/indexuser',           [MovieController::class,'indexuser']);

Route::group(['middleware'=>'auth:sanctum'], function() {
    
    // +++++++++++++++++++++++++++++++start Hall api++++++++++++++++++++++++++++++++
    Route::group(['prefix' => 'Hall','controller' => HallController::class], function() {
        Route::get('/',                          'index');
        Route::post('/',                          'store');
    });
    // +++++++++++++++++++++++++++++++end Hall api++++++++++++++++++++++++++++++++++

    // +++++++++++++++++++++++++++++++start Time api++++++++++++++++++++++++++++++++
     Route::group(['prefix' => 'Time','controller' => TimeController::class], function() {
        Route::get('/',                          'index');
        Route::post('/',                         'store');
        Route::get('/{time}',                    'edit');
        Route::put('/{time}',                    'update');
        Route::get('activate/{time}',            'activate');
        Route::get('deactivate/{time}',          'deactivate');
    });
    // +++++++++++++++++++++++++++++++end Time api++++++++++++++++++++++++++++++++++

    // +++++++++++++++++++++++++++++++start Ticket api++++++++++++++++++++++++++++++++
     Route::group(['prefix' => 'Ticket','controller' => TicketController::class], function() {
        Route::get('/stepOne/{movie}',                  'stepOne');
        Route::post('/stepTwo/{movie}',                  'stepTwo');
        Route::post('/store/{movie}',                  'store');
    });
    // +++++++++++++++++++++++++++++++end Ticket api++++++++++++++++++++++++++++++++++

    // +++++++++++++++++++++++++++++++start Movie api++++++++++++++++++++++++++++++++
    Route::group(['prefix' => 'Movie', 'controller' => MovieController::class], function() {
        Route::get('/',                    'index');
        Route::get('/create',              'create');
        Route::post('/',                   'store');
        Route::get('/{movie}',             'show');
        Route::get('/{movie}/edit',        'edit');
        Route::post('/{movie}',            'update');
        Route::delete('/{movie}',          'destroy');
        Route::get('/search',              'search');
    });
    // +++++++++++++++++++++++++++++++end Movie api++++++++++++++++++++++++++++++++++

    // +++++++++++++++++++++++++++++++start Snack api++++++++++++++++++++++++++++++++
    Route::group(['prefix' => 'Snack', 'controller' => SnackController::class], function() {
        Route::get('/',                    'index');
        Route::get('/indexuser',                    'indexuser');
        Route::post('/',                   'store');
        Route::get('/{snack}',             'show');
        Route::post('/{snack}',            'update');
        Route::get('activate/{snack}',     'activate');
        Route::get('deactivate/{snack}',   'deactivate');
        Route::get('/search',              'search');
    });
    // +++++++++++++++++++++++++++++++end Snack api++++++++++++++++++++++++++++++++++

    // +++++++++++++++++++++++++++++++start Order api++++++++++++++++++++++++++++++++
    Route::group(['prefix' => 'Order', 'controller' => OrderController::class], function() {
        Route::get('/ordered',             'ordered');
        Route::put('/approve/{order}',     'approve');
        Route::get('/approved',            'approved');
        Route::put('/received/{order}',    'received');
        Route::post('/',                   'store');
        Route::get('/{order}',             'show');
        Route::delete('/{order}',          'destroy');
        Route::get('/search',              'search');
    });
    // +++++++++++++++++++++++++++++++end Order api++++++++++++++++++++++++++++++++++

    // +++++++++++++++++++++++++++++++start Profile api++++++++++++++++++++++++++++++++
    Route::group(['prefix' => 'Profile','controller' => ProfileController::class], function() {
        Route::get('/info',           'info');
        Route::get('/mytickets',      'mytickets');
        Route::get('/myorders',      'myOrders');
        Route::put('/editprofile',    'editprofile');
        Route::put('/changepassword', 'changepassword');
    });
    // +++++++++++++++++++++++++++++++end Profile api++++++++++++++++++++++++++++++++++

    // +++++++++++++++++++++++++++++++start Account api++++++++++++++++++++++++++++++++
    Route::group(['prefix' => 'Account','controller' => AccountController::class], function() {
        Route::get('/{account}',     'show');
        Route::put('/ad/update',     'adminUpdate');
        Route::put('/dis/update',    'Update');
    });
    // +++++++++++++++++++++++++++++++end Account api++++++++++++++++++++++++++++++++++

    // +++++++++++++++++++++++++++++++start Price api++++++++++++++++++++++++++++++++
    Route::group(['prefix' => 'Price', 'controller' => PriceController::class], function() {
        Route::get('/',                    'index');
        Route::put('/{price}',           'update');
    });
    // +++++++++++++++++++++++++++++++end Price api++++++++++++++++++++++++++++++++++

     // +++++++++++++++++++++++++++++++start Invoice api++++++++++++++++++++++++++++++++
     Route::group(['prefix' => 'Invoice', 'controller' => InvoiceController::class], function() {
        Route::get('/',                    'myinvoices');
        Route::put('/{invoice}',           'update');
    });
    // +++++++++++++++++++++++++++++++end Invoice api++++++++++++++++++++++++++++++++++
});



require __DIR__.'/Basecode.php'; 


