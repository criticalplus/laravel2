<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\UserServerController;

use App\Http\Controllers\TestController;


//Grupo no autenticado
Route::controller( FrontPageController::class)->group(function () {

    Route::get ('/'                     , 'index' )                ->name('index');
    Route::post ('/'                    , 'store' )                ->name('contactForm');

});


/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */

//Grupo autenticado admin
Route::middleware('auth', 'admin')->group(function () {
    
        Route::get('/dashboard', function () {
            return view('AdminApp.dashboard');
        })                                                          ->name('dashboard');

        Route::controller( SearchController::class)->group(function () {

            Route::post('/users', 'userSearch' )                    ->name('users.search');
            Route::post('/support', 'supportSearch')                ->name('support.search');


        });

        Route::controller( UserController::class)->group(function () {

            Route::get('/users', 'index')                           ->name('users.index');
            
            Route::get('/users/{id}', 'show')                       ->name('users.show')     ->where('id', '[0-9]+');
            
            Route::get('/users/create', 'create')                   ->name('users.create');
            Route::post('/users/create', 'store')                   ->name('users.store');

            //Route::get('/users/edit/{id}', 'edit')                ->name('users.edit')     ->where('id', '[0-9]+');
            Route::post('/users/update/{d}/{id}', 'update')         ->name('users.update')   ->where('id', '[0-9]+');
            
            Route::delete('/users/destroy/{id}', 'destroy')         ->name('users.destroy')  ->where('id', '[0-9]+');

        });

        Route::controller( SupportController::class)->group(function () {

            Route::get('/support', 'index' )                        ->name('support.index');
            
            Route::get('/support/{support}', 'show' )               ->name('support.show');

            Route::post('/support/update/{support}', 'update')      ->name('support.update')   ->where('id', '[0-9]+');
            Route::delete('/support/destroy/{id}', 'destroy')       ->name('support.destroy')  ->where('id', '[0-9]+');
            Route::delete('/support/destroyT/{supportComment}', 'destroyT')     ->name('support.destroyT')  ->where('id', '[0-9]+');

        });

        Route::controller( AddressController::class)->group(function () {

            Route::get('/address', 'index')                           ->name('address.index');
            
            Route::get('/address/{id}', 'show')                       ->name('address.show')     ->where('id', '[0-9]+');
            
            Route::get('/address/create', 'create')                   ->name('address.create');
            Route::post('/address/create', 'store')                   ->name('address.store');

            Route::post('/address/update/{id}', 'update')             ->name('address.update')   ->where('id', '[0-9]+');
            
            Route::delete('/address/destroy/{id}', 'destroy')         ->name('address.destroy')  ->where('id', '[0-9]+');

        });

        Route::controller( UserServerController::class)->group(function () {

            Route::get('/userserver', 'index')                           ->name('userserver.index');
            
            Route::get('/userserver/{id}', 'show')                       ->name('userserver.show')     ->where('id', '[0-9]+');
            
            Route::get('/userserver/create/{user_id}', 'create')         ->name('userserver.create');
            Route::post('/userserver/create', 'store')                   ->name('userserver.store');

            Route::get('/userserver/edit/{id}', 'edit')                  ->name('userserver.edit')          ->where('id', '[0-9]+');
            Route::post('/userserver/update/{id}', 'update')             ->name('userserver.update')   ->where('id', '[0-9]+');
            
            Route::delete('/userserver/destroy/{id}', 'destroy')         ->name('userserver.destroy')  ->where('id', '[0-9]+');

        });
        

        
    /* - - - - - - - - - - - - - - - - - -  TEST   - - - - - - - - - - - - - - - - - - - - - - */

        Route::controller( TestController::class)->group(function () {

            Route::get('/test', 'index' )                           ->name('test');
            Route::get('/test1', 'test1' )                          ->name('test1');
            Route::get('/test2', 'test2' )                          ->name('test2');
            Route::get('/test3', 'test3' )                          ->name('test3');

        });

        Route::get('/mail', function () {
            return view('emails.register',  ['name' => 'Victoria', 'pass' => 'd9ah9r9h2h9r29h8ch98']);
        });
 

});


//Grupo autenticado user
Route::middleware('auth', 'user')->group(function () {

    
    Route::get('/panel', function () {
        return view('userApp.dashboard');
})                                                                  ->name('userPanel');




});


require __DIR__.'/auth.php';