<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration{

    public function up(){

        Schema::dropIfExists('supports');

        Schema::create('supports', function (Blueprint $table) {

            $table->id(); //Integer, Unsigned, AutoIncrement
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->string('replyName')->nullable();
            $table->string('replyMail')->nullable();
            $table->string('subject')->nullable();
            $table->enum('level', ['1', '2', '3', '4', '5'])->default('1');
            $table->timestamps();
            $table->softDeletes();

        });       
        
        /*  Añadimos relación de user_id con id de la tabla users*/
        Schema::table('supports', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->index('users_supports');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade')->index('admin_supports');
        });


    }

    public function down(){
        
        Schema::dropIfExists('supports');
    }
};
