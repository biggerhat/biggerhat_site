<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToMiniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('minis', function (Blueprint $table) {
            $table->text('image')->nullable();
            $table->longText('gameplay')->nullable();
            $table->integer('isDead')->default(0);
            $table->integer('isUnhirable')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mini', function (Blueprint $table) {
            //
        });
    }
}
