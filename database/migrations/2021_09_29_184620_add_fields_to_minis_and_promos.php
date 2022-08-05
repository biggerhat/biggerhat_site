<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToMinisAndPromos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('minis', function (Blueprint $table) {
            $table->text('display_name')->nullable();
        });

        Schema::table('promos', function (Blueprint $table) {
            $table->text('display_name')->nullable();
            $table->text('slug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('minis', function (Blueprint $table) {
            $table->dropColumn('display_name');
        });

        Schema::table('promos', function (Blueprint $table) {
            $table->dropColumn('display_name');
            $table->dropColumn('slug');
        });
    }
}
