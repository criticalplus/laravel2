<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    
    public function up(){

        Schema::dropIfExists('supports_comment');

        Schema::create('supports_comment', function (Blueprint $table) {

            $table->id(); //Integer, Unsigned, AutoIncrement
            $table->bigInteger('support_id')->unsigned();
            //$table->bigInteger('user_id')->unsigned()->nullable();
            $table->boolean('isAdmin')->default(0);
            $table->longText('message');
            $table->string('file')->nullable();
            $table->ipAddress('ip')->nullable();           
            $table->macAddress('mac')->nullable();
            $table->boolean('view', false)->default(false);
            $table->timestamps();

        });       
        
        /*  Añadimos relación de user_id con id de la tabla users*/
        Schema::table('supports_comment', function($table) {
            $table->foreign('support_id')->references('id')->on('supports')->onDelete('cascade')->index('supports_comment');
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->index('supports_user');
        });


    }

    
    public function down(){

        Schema::dropIfExists('supports_comment');
    }




    
};
