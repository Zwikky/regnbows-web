<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('details');
            $table->unsignedBigInteger('owner');
            $table->unsignedBigInteger('category');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('website')->nullable();
            $table->string('email');
            $table->integer('status')->default(1);
            $table->string('logoUrl');
            $table->string('image1Url');
            $table->string('image2Url');
            $table->string('image3Url');
            $table->timestamps();

            $table->foreign('category')->references('id')->on('categories');
            $table->foreign('owner')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}