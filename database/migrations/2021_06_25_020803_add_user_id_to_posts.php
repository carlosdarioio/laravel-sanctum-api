<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//
/*
alola

 creando migracion par aañadir propiedad a tabla
    php artisan make:migration add_user_id_to_posts

    cuando termines cambios correr
    php artisan migrate

*/
class AddUserIdToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_models', function (Blueprint $table) {
            //
            $table->integer('user_id')->nullable();/*mejor default 0*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_models', function (Blueprint $table) {
            //
            $table->dropColumn('user_id');
        });
    }
}
