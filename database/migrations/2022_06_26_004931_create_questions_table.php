<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('discipline_id');

            $table->foreign('discipline_id')
                ->references('id')
                ->on('discipline')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('simulations_id');

            $table->foreign('simulations_id')
                ->references('id')
                ->on('simulations')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
