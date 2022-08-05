<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqPivotTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ability_question', function (Blueprint $table) {
            $table->integer('ability_id')->unsigned()->index();
            $table->foreign('ability_id')->references('id')->on('abilities')->onDelete('cascade');
            $table->integer('question_id')->unsigned()->index();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('mini_question', function (Blueprint $table) {
            $table->integer('mini_id')->unsigned()->index();
            $table->foreign('mini_id')->references('id')->on('minis')->onDelete('cascade');
            $table->integer('question_id')->unsigned()->index();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('question_scheme', function (Blueprint $table) {
            $table->integer('question_id')->unsigned()->index();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->integer('scheme_id')->unsigned()->index();
            $table->foreign('scheme_id')->references('id')->on('schemes')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('question_strategy', function (Blueprint $table) {
            $table->integer('question_id')->unsigned()->index();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->integer('strategy_id')->unsigned()->index();
            $table->foreign('strategy_id')->references('id')->on('strategies')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('question_trigger', function (Blueprint $table) {
            $table->integer('question_id')->unsigned()->index();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->integer('trigger_id')->unsigned()->index();
            $table->foreign('trigger_id')->references('id')->on('triggers')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('question_sections', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->timestamps();
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->integer('season_id')->nullable();
            $table->integer('questionsection_id')->nullable();
            $table->integer('number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ability_question');
        Schema::dropIfExists('mini_question');
        Schema::dropIfExists('question_scheme');
        Schema::dropIfExists('question_strategy');
        Schema::dropIfExists('question_trigger');
        Schema::dropIfExists('question_sections');
    }
}
