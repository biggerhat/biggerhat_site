<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terrains', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('name');
            $table->longText('description');
        });

        Schema::create('marker_terrain', function (Blueprint $table) {
            $table->integer('marker_id')->unsigned()->index();
            $table->foreign('marker_id')->references('id')->on('markers')->onDelete('cascade');
            $table->bigInteger('terrain_id')->unsigned()->index();
            $table->foreign('terrain_id')->references('id')->on('terrains')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terrains');
        Schema::dropIfExists('marker_terrain');
    }
}
