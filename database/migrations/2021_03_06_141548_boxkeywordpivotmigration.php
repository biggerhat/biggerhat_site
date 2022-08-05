<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Boxkeywordpivotmigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('box_keyword', function (Blueprint $table) {
            $table->integer('box_id')->unsigned()->index();
            $table->foreign('box_id')->references('id')->on('boxes')->onDelete('cascade');
            $table->integer('keyword_id')->unsigned()->index();
            $table->foreign('keyword_id')->references('id')->on('keywords')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::table('box_mini', function (Blueprint $table) {
            $table->integer('quantity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('box_keyword');
    }
}
