<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('user_id')->nullable();
            $table->string('featured_one')->nullable();
            $table->string('logo')->nullable();
            $table->string('featured_two')->nullable();
            $table->string('featured_three')->nullable();
            $table->string('featured_four')->nullable();
            $table->string('featured_five')->nullable();
            $table->string('featured_six')->nullable();
            $table->string('slug');
            $table->text('description');
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('food1')->nullable();
            $table->string('food2')->nullable();
            $table->string('food3')->nullable();
            $table->string('food4')->nullable();
            $table->string('food5')->nullable();
            $table->string('food6')->nullable();
            $table->string('email');
            $table->string('address')->nullable();
            $table->string('location')->nullable();
            $table->boolean('verified')->default(0);
            $table->boolean('approved')->default(0);
            $table->boolean('published')->default(0);
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
        Schema::dropIfExists('listings');
    }
}
