<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reviewer');
            $table->unsignedBigInteger('place');
            $table->string('comment');
            $table->smallInteger('rating')->default(1);
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('reviewer')->references('id')->on('users');
            $table->foreign('place')->references('id')->on('places');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}