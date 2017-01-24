<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessoriesPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('accessories_photos', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('image_path');
        //     $table->string('image_name');
        //     $table->integer('position')->unsigned();
        //     $table->integer('accessories_id')->unsigned();
        //     $table->foreign('accessories_id')->references('id')->on('accessories')->onDelete('cascade');
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
        //Schema::dropIfExists('accessories_photos');
    }
}
