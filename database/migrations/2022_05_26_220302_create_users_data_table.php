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

        Schema::dropIfExists('users_data');

        Schema::create('users_data', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->unsigned();

            $table->enum('role', ['admin', 'cliente-1', 'cliente-2', 'cliente-3'])->default('cliente-1');
            $table->string('dni')->unique();
            
            //$table->timestamps();

        });       
        
        /*  Añadimos relación de user_id con id de la tabla users*/
        Schema::table('users_data', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->index('users_data');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        
        Schema::dropIfExists('users_data');
    }
};
