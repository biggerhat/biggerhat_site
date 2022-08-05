<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTacticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tacticas', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->longText('description')->nullable();
            $table->string('author')->nullable();
            $table->integer('keyword_id')->nullable();
            $table->integer('faction_id')->nullable();
            $table->integer('upgrade_id')->nullable();
            $table->integer('mini_id')->nullable();
            $table->integer('strategy_id')->nullable();
            $table->integer('scheme_id')->nullable();
            $table->text('slug')->nullable();
            $table->text('image')->nullable();
            $table->longText('summary')->nullable();
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
        Schema::table('tacticas', function (Blueprint $table) {
            //
        });
    }
}
