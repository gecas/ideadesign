<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWallpapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('wallpapers', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('title_lt');
        //     $table->string('title_en');
        //     $table->string('title_ru');
        //     $table->text('text_lt');
        //     $table->text('text_en');
        //     $table->text('text_ru');
        //     $table->string('manufacturer_url');
        //     $table->integer('category_id')->unsigned();
        //     $table->foreign('category_id')->references('id')->on('wallpapers_categories')->onDelete('cascade');
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
       // Schema::dropIfExists('wallpapers');
    }
}
