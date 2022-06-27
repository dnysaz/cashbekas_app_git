<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ads_id');
            $table->string('user_id');
            $table->string('category');
            $table->string('photo1');
            $table->string('photo2')->nullable();
            $table->string('photo3')->nullable();
            $table->string('title');
            $table->string('price');
            $table->string('condition');
            $table->text('desc');
            $table->string('location');
            $table->string('address');
            $table->string('name');
            $table->string('phone');
            $table->string('agreement');
            $table->string('draft')->nullable();
            $table->string('link');
            $table->string('status');

            $table->string('reason')->nullable();
            $table->string('detail_reason')->nullable();

            $table->string('report_reason')->nullable();

            $table->string('stop_reason')->nullable();

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
        Schema::dropIfExists('ads');
    }
}
