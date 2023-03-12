<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::dropIfExists('addresses');

        Schema::create('addresses', function (Blueprint $table) {

            $table->id();

            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('country_id')->unsigned()->nullable();
            $table->bigInteger('state_id')->unsigned()->nullable();
            $table->bigInteger('city_id')->unsigned()->nullable();

            $table->string('alias', 40)->nullable()->default('Alias');
            $table->string('address');
            $table->string('postal_code', 10);
            $table->string('phone', 20);
            $table->boolean('active')->default(0);
            
            $table->timestamps();

        });       
        
        /*  Añadimos relación de user_id con id de la tabla users*/
        Schema::table('addresses', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->index('users_address');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null')->index('country_address');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('set null')->index('state_address');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null')->index('city_address');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        
        Schema::dropIfExists('addresses');
    }
};
