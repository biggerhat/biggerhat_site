<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBoxPromoPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('box_promo', function (Blueprint $table) {
            $table->integer('box_id')->unsigned()->index();
            $table->foreign('box_id')->references('id')->on('boxes')->onDelete('cascade');
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
        Schema::dropIfExists('box_promo');
    }
}
