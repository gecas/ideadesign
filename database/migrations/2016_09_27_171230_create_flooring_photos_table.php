<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlooringPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('flooring_photos', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('image_path');
        //     $table->string('image_name');
        //     $table->integer('position')->unsigned();
        //     $table->integer('flooring_id')->unsigned();
        //     $table->foreign('flooring_id')->references('id')->on('floorings')->onDelete('cascade');
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
        //Schema::dropIfExists('flooring_photos');
    }
}
