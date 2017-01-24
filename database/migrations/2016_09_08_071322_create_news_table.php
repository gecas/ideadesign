<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('news', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('title_lt');
        //     $table->string('title_en');
        //     $table->string('title_ru');
        //     $table->string('slug');
        //     $table->string('image_name');
        //     $table->string('image_path');
        //     $table->text('excerpt_lt');
        //     $table->text('excerpt_en');
        //     $table->text('excerpt_ru');
        //     $table->text('body_lt');
        //     $table->text('body_en');
        //     $table->text('body_ru');
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
        //Schema::dropIfExists('news');
    }
}
