<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(){

        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){        
        
        /**
         *
         *  @isAdmin
         *      -only rol admin-
         *  @endisAdmin
         *
         */
        Blade::if('isAdmin', function () {
            
            if( auth()->check() AND auth()->user()->role == 'admin' ){
                
                return true;
            
            }else{

                return false;

            }
                     
        });


    }


}
