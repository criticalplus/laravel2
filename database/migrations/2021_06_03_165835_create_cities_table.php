<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{



    

    public function up(){

        Schema::dropIfExists('cities');
        
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->nullable()->references('id')->on('countries')->onDelete('set null');
            $table->foreignId('state_id')->nullable()->references('id')->on('states')->onDelete('set null');
            $table->string('title',100);
        });
        
    }
    
    public function down(){

        Schema::dropIfExists('cities');
    }


    
};
