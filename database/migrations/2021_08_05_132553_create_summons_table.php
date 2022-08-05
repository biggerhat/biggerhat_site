<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summons', function (Blueprint $table) {
            $table->id();
            $table->integer('summoner_id');
            $table->text('chart')->nullable();
            $table->timestamps();
        });

        Schema::create('mini_summon', function (Blueprint $table) {
            $table->integer('mini_id')->unsigned()->index();
            $table->foreign('mini_id')->references('id')->on('minis')->onDelete('cascade');
            $table->bigInteger('summon_id')->unsigned()->index();
            $table->foreign('summon_id')->references('id')->on('summons')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('summon_upgrade', function (Blueprint $table) {
            $table->bigInteger('summon_id')->unsigned()->index();
            $table->foreign('summon_id')->references('id')->on('summons')->onDelete('cascade');
            $table->integer('upgrade_id')->unsigned()->index();
            $table->foreign('upgrade_id')->references('id')->on('upgrades')->onDelete('cascade');
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
        Schema::dropIfExists('summons');
        Schema::dropIfExists('mini_summon');
        Schema::dropIfExists('summon_upgrade');
    }
}
