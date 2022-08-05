<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInstructionPromoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instruction_promo', function (Blueprint $table) {
            $table->integer('instruction_id')->unsigned()->index();
            $table->foreign('instruction_id')->references('id')->on('instructions')->onDelete('cascade');
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
        Schema::dropIfExists('instruction_promo');
    }
}
