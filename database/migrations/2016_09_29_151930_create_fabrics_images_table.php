<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFabricsImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('fabrics_images', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('image_path');
        //     $table->string('image_name');
        //     $table->integer('position')->unsigned();
        //     $table->integer('fabrics_id')->unsigned();
        //     $table->foreign('fabrics_id')->references('id')->on('fabrics')->onDelete('cascade');
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
        //Schema::dropIfExists('fabrics_images');
    }
}
