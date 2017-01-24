<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWallpapersCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('wallpapers_categories', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('title');
        //     $table->string('slug');
        //     $table->string('logo_path');
        //     $table->string('logo_name');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       // Schema::dropIfExists('wallpapers_categories');
    }
}
