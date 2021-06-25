<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//php artisan make:model PostModel -m
class CreatePostModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //cuando la termines correr
    //php artisan migrate
    public function up()
    {
        Schema::create('post_models', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->mediumText('body');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_models');
    }
}
