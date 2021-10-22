<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCulturePivotTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('culture_mini', function (Blueprint $table) {
            $table->integer('culture_id')->unsigned()->index();
            $table->foreign('culture_id')->references('id')->on('cultures')->onDelete('cascade');
            $table->integer('mini_id')->unsigned()->index();
            $table->foreign('mini_id')->references('id')->on('minis')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('culture_promo', function (Blueprint $table) {
            $table->integer('culture_id')->unsigned()->index();
            $table->foreign('culture_id')->references('id')->on('cultures')->onDelete('cascade');
            $table->integer('promo_id')->unsigned()->index();
            $table->foreign('promo_id')->references('id')->on('promos')->onDelete('cascade');
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
        Schema::dropIfExists('culture_mini');
        Schema::dropIfExists('culture_promo');
    }
}
