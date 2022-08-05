<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoxInstructionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('box_instruction', function (Blueprint $table) {
            $table->integer('box_id')->unsigned()->index();
            $table->foreign('box_id')->references('id')->on('boxes')->onDelete('cascade');
            $table->integer('instruction_id')->unsigned()->index();
            $table->foreign('instruction_id')->references('id')->on('instructions')->onDelete('cascade');
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
        Schema::dropIfExists('box_instruction');
    }
}
