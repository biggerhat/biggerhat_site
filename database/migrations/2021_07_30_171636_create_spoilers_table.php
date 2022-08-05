<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpoilersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spoilers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('name');
            $table->text('source');
            $table->text('url');
        });

        Schema::create('spoilerizes', function (Blueprint $table) {
            $table->integer('spoiler_id');
            $table->integer('spoilerize_id');
            $table->string('spoilerize_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spoilers');
        Schema::dropIfExists('spoilerizes');
    }
}
