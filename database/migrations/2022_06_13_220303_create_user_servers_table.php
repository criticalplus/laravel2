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

        Schema::dropIfExists('users_server');

        Schema::create('users_server', function (Blueprint $table) {

            $table->id();

            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('cm_version_id')->unsigned()->nullable();

            $table->string('name', 40)->default('Server Name');
            $table->string('ws_url');
            $table->string('ws_api');
            $table->string('color', 7);
            $table->boolean('active')->default(1);
            
            $table->timestamps();
            $table->softDeletes();

        });       
        

        Schema::table('users_server', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->index('users_servers');
            $table->foreign('cm_version_id')->references('id')->on('cm_versions')->onDelete('set null')->index('servers_cm_versions');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        
        Schema::dropIfExists('users_server');
    }
};
