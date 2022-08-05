<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRetailInfoToBoxes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('boxes', function (Blueprint $table) {
            $table->string('item_number')->nullable();
            $table->string('upc')->nullable();
            $table->string('distributor_description')->nullable();
            $table->decimal('msrp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('boxes', function (Blueprint $table) {
            $table->dropColumn('item_number');
            $table->dropColumn('upc');
            $table->dropColumn('distributor_description');
            $table->dropColumn('msrp');
        });
    }
}
