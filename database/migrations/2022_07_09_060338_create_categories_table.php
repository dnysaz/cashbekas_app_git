<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category')->nullable();
            $table->string('icon')->nullable();
            $table->string('slug')->nullable();
            $table->string('sub_1')->nullable();
            $table->string('sub_2')->nullable();
            $table->string('sub_3')->nullable();
            $table->string('sub_4')->nullable();
            $table->string('sub_5')->nullable();
            $table->string('user')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
