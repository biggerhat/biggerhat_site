<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitlesToMinis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('minis', function (Blueprint $table) {
            $table->boolean('hasTitle')->default(false);
            $table->text('title')->nullable();
            $table->integer('original_id')->nullable();
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
            $table->dropColumn('hasTitle');
            $table->dropColumn('title');
            $table->dropColumn('original_id');
        });
    }
}
