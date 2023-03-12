<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up(){

        Schema::dropIfExists('states');
        
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->nullable()->references('id')->on('countries')->onDelete('set null');
            $table->string('title',100);
        });
        
    }

    public function down(){
        
        Schema::dropIfExists('states');
    }
    
};

