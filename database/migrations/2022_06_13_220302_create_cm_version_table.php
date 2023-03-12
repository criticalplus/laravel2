<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration{

    
    public function up(){

        Schema::dropIfExists('cm_versions');

        Schema::create('cm_versions', function (Blueprint $table) {

            $table->id();

            $table->string('name', 20);
            $table->string('version', 40);
            $table->date('publishing');

        });       
        
    }

    
    public function down(){
        
        Schema::dropIfExists('cm_versions');
    }
};
